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

$(document).ready(function () {
    $("#editBtn").click(function () {
        $("input, select").prop("disabled", false);
        $("#editBtn").hide();
        $("#saveBtn").show();
    });
});
