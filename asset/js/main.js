document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("modal");
    var modalButton = document.getElementById("modalButton");
    var span = document.getElementsByClassName("close")[0];

    modalButton.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
