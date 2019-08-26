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

$("document").ready(function () {
    document.getElementsByClassName("navitem")[1].innerText = "Rankings";
    let avgranks = document.getElementsByClassName("avg_rank")
    for (let i = 1; i < avgranks.length; i++) {
        let num = Number(avgranks[i].innerText);
        num = Math.round( num * 10) / 10
        avgranks[i].innerText = num;
    }
});