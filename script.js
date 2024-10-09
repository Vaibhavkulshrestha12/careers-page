document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let isValid = true;
    const requiredFields = ['email', 'name', 'registrationNumber', 'contactNumber', 'programName', 'residenceType', 'tShirtSize', 'whatsappNumber', 'degreeYear', 'isWilling'];

    requiredFields.forEach(function(field) {
        const input = document.getElementById(field);
        if (!input.value) {
            isValid = false;
            input.classList.add('border-red-500'); // Add error class
        } else {
            input.classList.remove('border-red-500'); // Remove error class
        }
    });

    if (!isValid) {
        event.preventDefault(); // Prevent form submission
        alert('Please fill in all required fields.');
    }
});

