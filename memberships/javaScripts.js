document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('membershipOffer').addEventListener('click', function() {
        var form = document.getElementById('paymentForm');
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
    });

    document.getElementById('membershipForm').addEventListener('submit', function(event) {
        event.preventDefault();  

        // Gather form data
        var formData = new FormData(this);

        // AJAX request to the server
        fetch('memberships.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(html => {
            
            document.getElementById('paymentForm').style.display = 'none';
            document.getElementById('membershipOffer').style.display = 'none';
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('gc-button').style.display = 'block';
            
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});