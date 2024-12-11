document.querySelector('.php-email-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
    })
        .then(response => response.text())
        .then(result => {
            if (result === "success") {
                form.querySelector('.sent-message').classList.add('d-block');
                form.reset();
            } else if (result === "validation_error") {
                form.querySelector('.error-message').innerText = "Please fill out all fields correctly.";
                form.querySelector('.error-message').classList.add('d-block');
            } else {
                form.querySelector('.error-message').innerText = "Something went wrong. Please try again.";
                form.querySelector('.error-message').classList.add('d-block');
            }
        })
        .catch(() => {
            form.querySelector('.error-message').innerText = "Something went wrong. Please try again.";
            form.querySelector('.error-message').classList.add('d-block');
        });
});
