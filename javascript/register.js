document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('.custom-form');

    form.addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        var email = document.getElementById('email').value.trim();
        var password = document.getElementById('password').value.trim();
        var username = document.getElementById('username').value.trim();
        var phoneNumber = document.getElementById('PhoneNumber').value.trim();
        var genderMale = document.getElementById('male').checked;
        var genderFemale = document.getElementById('female').checked;

        if (email === '' || password === '' || username === '' || phoneNumber === '') {
            alert('All fields must be filled out.');
            return false;
        }

        if (!genderMale && !genderFemale) {
            alert('Please select a gender.');
            return false;
        }

        // You can add more specific validations as needed

        return true;
    }
});
