function validateForm() {
    // You can add custom validation logic here
    // For example, checking if the email and password are filled
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email === "" || password === "") {
        alert("Email and password are required!");
        return false;
    }

    // If the validation passes, the form will be submitted
    return true;
}
