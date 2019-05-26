$("document").ready(function(){
    tableDragger(document.getElementById("song_list"), {
        mode : "row",
        dragHandler : ".draggable",
        onlyBody : true
    });
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
}

function submit() {
    console.log("submit button has been clicked");
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

document.addEventListener("mouseup", updateRanks, false);