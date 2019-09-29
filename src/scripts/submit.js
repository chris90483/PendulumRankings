let audio = undefined
let currentAudioId = -1

function changeAudio(id) {
    if (!(audio === undefined)) {
        if (!(currentAudioId === id)) {
            audio.pause();
            getAudio(id);
            return;
        }
        if (audio.paused) {
            audio.play();
        } else {
            audio.pause();
        }
    } else {
        getAudio(id);
    }
}

function getAudio(id) {
    currentAudioId = id;
    let request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
            audio = new Audio(request.responseText);
            audio.play();
        }
    };
    request.open("GET", "songrequest.php?getSong=" + id.toString(), true);
    request.send();
}

$("document").ready(function(){
    tableDragger(document.getElementById("song_list"), {
        mode : "row",
        dragHandler : ".draggable",
        onlyBody : true
    });
    document.getElementsByClassName("navitem")[2].innerText = "Submit";
    document.addEventListener("mouseup", updateRanks, false);
});

function deconfirmSubmit() {
    document.getElementById("submit").style.display = "block";
    document.getElementById("submission_msg").style.display = "none";
    document.getElementById("submit_confirm").style.display = "none";
    document.getElementById("submit_deconfirm").style.display = "none";
}

function showSubmit() {
    document.getElementById("submit").style.display = "none";
    document.getElementById("submission_msg").style.display = "block";
    document.getElementById("submit_confirm").style.display = "block";
    document.getElementById("submit_deconfirm").style.display = "block";
    window.scrollTo(0,document.body.scrollHeight);
}

function submit() {
    let rankings = document.getElementsByClassName("song_entry");
    let requestText = "";
    for (let i = 0; i < rankings.length; i++) {
        console.log(i)
        let row = rankings[i];
        if (row.id === "unranked_divider") {
            break;
        }
        requestText += ((i + 1) + "=" + row.getElementsByClassName("song_title")[0].innerHTML + ";");
    }

    let request = new XMLHttpRequest();
    request.open("POST", "submissionreceiver.php?submission=" + requestText, true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            alert("submission received, thanks!")
        }
    };
    document.location = "rankings.php"
}

function updateRanks() {
    let songs = document.getElementsByClassName("song_entry");
    let seen_divider = false;
    for (let i = 0; i < songs.length; i++) {
        if (songs[i].id === "unranked_divider") {
            seen_divider = true;
            continue;
        }
        if (seen_divider) {
            songs[i].getElementsByClassName("song_rank")[0].innerHTML = "-";
        } else {
            songs[i].getElementsByClassName("song_rank")[0].innerHTML = (i + 1).toString();
        }
    }
}