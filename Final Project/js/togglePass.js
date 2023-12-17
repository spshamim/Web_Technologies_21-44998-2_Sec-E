document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInputs = document.querySelectorAll('input[type="password"]');

    togglePassword.addEventListener('change', function () {
        passwordInputs.forEach(input => {
            input.type = togglePassword.checked ? 'text' : 'password';
        });
    });
});