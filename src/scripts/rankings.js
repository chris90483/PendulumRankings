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
})