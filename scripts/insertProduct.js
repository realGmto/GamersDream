const nameInput = document.getElementById('name');
const imageInput = document.getElementById('image');
const priceInput = document.getElementById('price');
const descriptionInput = document.getElementById('description');
const genreInput = document.getElementById('genre');

const urlRegex = /(https?:\/\/.*\.(?:png|jpg|jpeg|gif))/i;

function Validate(event){
    event.preventDefault();
    let isValid = true;

    if (nameInput.value.trim() === '') {
        nameInput.classList.add('is-invalid');
        isValid = false;
    } else {
        nameInput.classList.remove('is-invalid');
        nameInput.classList.add('is-valid');
    }

    if (!urlRegex.test(imageInput.value)) {
        imageInput.classList.add('is-invalid');
        isValid = false;
    } else {
        imageInput.classList.remove('is-invalid');
        imageInput.classList.add('is-valid');
    }

    if (priceInput.value === '' || parseFloat(priceInput.value) <= 0) {
        priceInput.classList.add('is-invalid');
        isValid = false;
    } else {
        priceInput.classList.remove('is-invalid');
        priceInput.classList.add('is-valid');
    }

    if (descriptionInput.value.trim() === '') {
        descriptionInput.classList.add('is-invalid');
        isValid = false;
    } else {
        descriptionInput.classList.remove('is-invalid');
        descriptionInput.classList.add('is-valid');
    }

    if (genreInput.value.trim() === '') {
        genreInput.classList.add('is-invalid');
        isValid = false;
    } else {
        genreInput.classList.remove('is-invalid');
        genreInput.classList.add('is-valid');
    }

    if (isValid) {
        form = document.getElementById("gameForm");
        const formData = new FormData(form);
    
        let requestOptions ={
            method: 'POST',
            body: formData
        };
        fetch("http://localhost/GamersDream/api/addGame.php",requestOptions)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert('Game added successfully!', 'success');
                form.reset();
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => {
            showAlert('An error occurred. Please try again later.', 'danger');
        });
    }

    // Bootstrap validation class to display validation state
    form.classList.add('was-validated');
}



function showAlert(message, type) {
    const alertPlaceholder = document.getElementById('alertPlaceholder');
    const alert = `<div class="alert alert-${type} alert-dismissible" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`;
    alertPlaceholder.innerHTML = alert;
}