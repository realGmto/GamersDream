function Login(event){
    event.preventDefault()

    let requestOptions;
    let email = document.getElementById('signInEmail').value;
    let password = document.getElementById('signInPassword').value;

    let valid = true;
    document.getElementById('signInEmailError').textContent = "";
    document.getElementById('signInPasswordError').textContent = "";

    // Email validation is not needed as html has build in system for email validation

    // Password validation
    if (password.trim() === "") {
        document.getElementById('signInPasswordError').textContent = "Password is required";
        valid = false;
    }

    if (valid) {
        requestOptions = {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({
                email: email,
                password: password
            })
        };
        fetch("http://localhost/GamersDream/api/login.php", requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Get response body text
        })
        .then(result => {
            if (result.success){
                console.log("Successfully login");
                var signInModal = new bootstrap.Modal('#signInModal');
                signInModal.hide();
                window.location.reload();

            } else{
                document.getElementById('loginMessage').innerHTML = 'Error: ' + result.error;
            }
        })
        .catch(error => console.error('Error:', error)); // Catch and log any errors
    }
}

function Logout(){
    fetch("http://localhost/GamersDream/api/logout.php", {
        method: "POST",
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Logged out successfully");
            window.location.reload();
        } else {
            console.error("Logout failed");
        }
    })
    .catch(error => console.error('Error:', error));
}

function Register(event){
    event.preventDefault()
    let requestOptions;
    let username = document.getElementById('registerUsername').value;
    let email = document.getElementById('registerEmail').value;
    let password = document.getElementById('registerPassword').value;
    let confirmPassword = document.getElementById('confirmPassword').value;

    let valid = true;
    document.getElementById('registerUsernameError').textContent = "";
    document.getElementById('registerEmailError').textContent = "";
    document.getElementById('registerPasswordError').textContent = "";
    document.getElementById('confirmPasswordError').textContent = "";

    if (username.trim().length < 3) {
        document.getElementById('registerUsernameError').textContent = "Username must be at least 3 characters long";
        valid = false;
    }

    // Email validation is not needed as html has build-in system for email validation

    if (password.length < 6) {
        document.getElementById('registerPasswordError').textContent = "Password must be at least 6 characters long";
        valid = false;
    }

    if (password !== confirmPassword) {
        document.getElementById('confirmPasswordError').textContent = "Passwords do not match";
        valid = false;
    }

    if(valid){
        console.log("Register Form is valid")
        requestOptions = {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({
                username: username,
                email: email,
                password: password
            })
        };
        fetch("http://localhost/GamersDream/api/register.php", requestOptions)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Get response body text
        })
        .then(result => {
            if (result.success){
                console.log("Successfully Registered");
                var registerModal = new bootstrap.Modal('#registerModal');
                registerModal.hide();
            } else{
                document.getElementById('registerMessage').innerHTML = 'Error: ' + result.error;
            }
        })
        .catch(error => console.error('Error:', error)); // Catch and log any errors
    }
}


document.getElementById('goToRegister').addEventListener('click', function () {
    var registerModal = new bootstrap.Modal('#registerModal');
    registerModal.show();
});

document.getElementById('goToSignIn').addEventListener('click', function () {
    var signInModal = new bootstrap.Modal('#signInModal');
    signInModal.show();
});