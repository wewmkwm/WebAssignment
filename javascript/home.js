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

    // Search function
    const searchButton = document.querySelector('.search-bar button');
    const eventContainers = document.querySelectorAll('.container-box');

    searchButton.addEventListener('click', function () {
        const searchTerm = document.querySelector('.search-bar input').value.toLowerCase();

        eventContainers.forEach(container => {
            const eventName = container.querySelector('h3').innerText.toLowerCase();
            if (eventName.includes(searchTerm)) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Sample data (replace with your dynamic data from the server)
    const events = [
        { name: 'Event 1', dateFrom: '2023-12-01', dateUntil: '2023-12-05', timeFrom: '10:00', timeUntil: '15:00', location: 'Sample Location 1', organizer: 'Organizer 1' },
        { name: 'Event 2', dateFrom: '2023-12-10', dateUntil: '2023-12-12', timeFrom: '12:00', timeUntil: '18:00', location: 'Sample Location 2', organizer: 'Organizer 2' },
        // Add more events as needed
    ];

    // Display Events
    const eventContainer = document.getElementById('eventContainer');
    events.forEach(event => {
        const eventItem = document.createElement('div');
        eventItem.classList.add('col-md-4', 'mb-4');
        eventItem.innerHTML = `
            <div class="container-box">
                <h3>${event.name}</h3>
                <p>Date: ${event.dateFrom} to ${event.dateUntil}</p>
                <p>Time: ${event.timeFrom} to ${event.timeUntil}</p>
                <p>Location: ${event.location}</p>
                <p>Organizer: ${event.organizer}</p>
                <button class="btn btn-primary" onclick="showEventDetails(${events.indexOf(event)})">Details</button>
            </div>
        `;
        eventContainer.appendChild(eventItem);
    });
});

// Function to show event details (you can implement this in a separate file)
function showEventDetails(eventIndex) {
    // Implement logic to display details (e.g., using a modal)
    console.log('Showing details for event with index:', eventIndex);
}
