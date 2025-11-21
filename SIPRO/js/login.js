function validateForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    if (username === 'sipro' && password === '12345') {
        window.location.href = 'principal.html';
        return false;
    } else {
        errorMessage.textContent = 'Usuario o contraseña incorrectos.';
        return false;
    }
}