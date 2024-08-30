document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const accountId = document.getElementById('accountId').value;
    const password = document.getElementById('password').value;

    // Basic validation
    if (accountId === '' || password === '') {
        alert('Please fill in both fields');
    } else {
        alert('Form submitted');
        // You can add your login logic here
    }
});
