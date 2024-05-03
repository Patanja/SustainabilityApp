document.addEventListener('DOMContentLoaded', function() {
    // Hide all aspects except the first by default
    var aspects = document.querySelectorAll('.form-section');
    aspects.forEach((section, index) => {
        if (index !== 0) { // skip the first aspect
            section.style.display = 'none';
        }
    });

    // Function to show the next aspect when a selection is made
    aspects.forEach((section, index) => {
        let selectElement = section.querySelector('select');
        if (selectElement) {
            selectElement.addEventListener('change', function() {
                if (index + 1 < aspects.length) {
                    aspects[index + 1].style.display = 'block'; // Show the next aspect
                }
            });
        }
    });

    // Start button to hide instructions and show the first aspect of the form
    var startButton = document.getElementById('startButton');
    var instructions = document.getElementById('instructions');
    var mainForm = document.getElementById('mainForm');

    startButton.addEventListener('click', function() {
        instructions.style.display = 'none'; // Hide the instructions
        mainForm.style.display = 'block'; // Show the form
        aspects[0].style.display = 'block'; // Ensure the first aspect is visible
    });
});

function scrollToNextAspect(currentAspectId) {
    var nextAspectId = currentAspectId + 1;  // Calculate the ID of the next aspect
    var nextAspect = document.getElementById('aspect' + nextAspectId);  // Get the next aspect element

    if (nextAspect) {
        nextAspect.style.display = 'block';  // Make sure the next aspect is visible
        nextAspect.scrollIntoView({ behavior: 'smooth', block: 'start' });  // Smooth scroll to the next aspect
    }
}
