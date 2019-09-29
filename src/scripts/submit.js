let audio = undefined;
let currentAudioId = -1;
let currentRankEditing = undefined;

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

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
    for (let j = 0; j < songs.length; j++) {
        for (let i = 0; i < songs.length - 1; i++) {
            if (Number(songs[i].getElementsByClassName("song_rank")[0].innerText.toString()) > Number(songs[i + 1].getElementsByClassName("song_rank")[0].innerText.toString())) {
                let temp = songs[i];
                songs[i] = songs[i + 1];
                songs[i + 1] = temp;
            }
        }
    }
}

function setEditing(elem) {
    updateRanks();
    currentRankEditing = elem;
    elem.innerText = "";
}

function edit(e) {
    console.log(e.key);
    if (currentRankEditing !== undefined) {
        if (e.key === "Enter") {
            currentRankEditing = undefined;
            updateRanks();
        } else if (isNumber(e.key)) {
            currentRankEditing.innerText += e.key;
        } else if (e.key === "Backspace") {
            currentRankEditing.innerText = currentRankEditing.innerText.toString().slice(0,-1);
        }
    }
}

$("document").ready(function(){
    document.getElementsByClassName("navitem")[2].innerText = "Submit";
    document.addEventListener("keydown", edit);
});

// elem.on('keydown', function(e) {
//     console.log(e.key);
//     console.log(typeof e.key);
// });