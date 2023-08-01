document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('/chouette/signin', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status == 'success') {
                // The login was successful.
                // You could redirect the user to another page, or close the modal.
            } else {
                // The login failed.
                // You can display the error message in the modal.
                document.getElementById('loginErrorMessage').textContent = data.message;
            }
        });
});

document.getElementById('signupForm').addEventListener('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('/chouette/register', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status == 'success') {
                // The registration was successful.
                // You could redirect the user to another page, or close the modal.
            } else {
                // The registration failed.
                // You can display the error message in the modal.
                document.getElementById('signupErrorMessage').textContent = data.message;
            }
        });
});
