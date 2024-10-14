// wysiwyg/htmeditor
new FroalaEditor("textarea");

var elem = document.querySelector("body");
const notif = document.getElementById("notif");

function openFullscreen(node) {
    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) {
        /* Safari */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
        /* IE11 */
        elem.msRequestFullscreen();
    }
    node.classList.add("hidden");
    document.getElementById("exitScreen").classList.remove("hidden");
}

function closeFullscreen(node) {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
        /* Safari */
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
        /* IE11 */
        document.msExitFullscreen();
    }
    document.getElementById("fullScreen").classList.remove("hidden");
    node.classList.add("hidden");
}

function lineSlide() {
    const lineRunner = document.getElementById("notif-line");
    lineRunner.style.border = "2px solid white";
    for (let i = 0; i < 316; i++) {
        lineRunner.style.width = i + "px";
        lineRunner.style.transitionDelay = "5s";
        lineRunner.style.transition = "width 5s";
    }
    setTimeout(function () {
        notif.classList.add("hidden");
    }, 3000);
}

const icons = {
    info: "bi bi-info-circle",
    warning: "bi bi-exclamation-triangle",
    error: "bi bi-x-circle",
    success: "bi bi-check2-circle",
};

const arrWarna = {
    info: "bg-zinc-800 ",
    warning: "bg-yellow-600",
    error: "bg-red-600",
    success: "bg-green-600",
};

function cardBackgroundColor(warna) {
    notif.classList.add("bg-red-600");
}

function notification(judul, pesan, warna) {
    if (notif != undefined) {
        var myElement =
            '<div class="flex w-auto rounded-xl p-1 text-white drop-shadow" id="hide-notif">' +
            '<div class="p-1">' +
            '<i class="' +
            icons[warna] +
            ' text-white" style="font-size:50px"></i>' +
            "</div>" +
            '<div class=" p-1 ps-2 min-w-14 w-full text-white">' +
            '<h4 class="mb-0 font-bold md:text-2xl xl:text-2xl text-2xl" style="text-transform:capitalize">' +
            judul +
            "</h4>" +
            '<span class="text-[10px] lg:text-[15px] md:text-[11px]">' +
            pesan +
            "</span>" +
            "</div>" +
            '<div class="p-1 d-inline ">' +
            '<button @click="open = ! open" type="button" style="padding:0;background-color:transparent;border:0">' +
            '<i class="fs-5 text-white bi bi-x"></i>' +
            "</button>" +
            "</div>" +
            "</div>" +
            '<hr style="border:0px solid white;width:0px;margin:0;padding:0;opacity:100%;border-radius:2px;margin:0 2px;" id="notif-line">';
        notif.innerHTML = myElement;
        setTimeout(function () {
            lineSlide();
        }, 700);
    }
}
