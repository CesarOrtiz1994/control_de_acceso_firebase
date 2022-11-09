
const toastView = document.getElementById('liveToast')

function toast(type, text) {
    const toast = new bootstrap.Toast(toastView)
    let bg = document.getElementById("header_toast");
    let body = document.getElementById("body_toast");
    bg.classList.remove("bg-success");
    body.classList.remove("bg-success");
    bg.classList.remove("bg-danger");
    body.classList.remove("bg-danger");

    bg.classList.add("bg-" + type);
    body.classList.add("bg-" + type);
    body.innerHTML = "<h5>" + text + "</h5>";

    toast.show()
}

