/*
document.getElementById('registerForm').addEventListener('submit', function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the current locale from the server (you need to output this server-side)
    let currentLocale = "{{ app()->setLocale('ar') }}"; // Set the locale value in the Blade template

    // Custom validation messages
    let messages = {
        'en': 'Please fill in this field.',
        'ar': 'يرجى ملء هذا الحقل.'
    };

    // Check each required field
    let isValid = true;
    this.querySelectorAll('[required]').forEach(function(field) {
        if (!field.value) {
            // If the field is empty, show the custom message
            isValid = false;
            alert(messages[currentLocale]); // Show custom message in alert (or use a more user-friendly UI)
            field.focus();
        }
    });

    // If the form is valid, submit it
    if (isValid) {
        this.submit();
    }
});

*/

console.log('gfregergv')

