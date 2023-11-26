document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.querySelector('.nav-toggle');
    const navLinks = document.querySelector('.nav-links');

    navToggle.addEventListener('click', function () {
      navLinks.classList.toggle('show');
    });

    // Close navigation links when clicking outside the navigation bar
    document.addEventListener('click', function (e) {
      if (!e.target.closest('nav') && !e.target.classList.contains('nav-toggle')) {
        navLinks.classList.remove('show');
      }
    });

    // Smooth scrolling to anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();

        navLinks.classList.remove('show');

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  });

document.addEventListener('DOMContentLoaded', function () {
    // Add Event Form (you can implement this form in a separate file or inline)
    const addEventFormContainer = document.getElementById('addEventForm');
    const addEventForm = document.createElement('form');
    addEventForm.setAttribute('action', '/path-to-submit-form');
    addEventForm.setAttribute('method', 'post');
    addEventForm.setAttribute('enctype', 'multipart/form-data');

    // ... (add form fields as needed)

    // Submit Button
    const submitButton = document.createElement('button');
    submitButton.setAttribute('type', 'submit');
    submitButton.classList.add('btn', 'btn-primary');
    submitButton.textContent = 'Submit';

    addEventForm.appendChild(submitButton);
    addEventFormContainer.appendChild(addEventForm);
});

// Add event form fields dynamically if needed
// Implement validation and submission logic
