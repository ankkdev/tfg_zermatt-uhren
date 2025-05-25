document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('form-login');//capturar el formulario correspondiente
    if (!loginForm) return; //detener si no existe el formulario
    loginForm.addEventListener('submit', function (e) {
        let valid = true;
        const emailField = loginForm.querySelector('input[name="email"]');
        const passwordField = document.getElementById('pswd');

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;//validar correo electronico
        if (!emailRegex.test(emailField.value.trim())) {
            alert("Correo invalido.");
            valid = false;
        }

        if (passwordField.value.length < 6) {//la contraseña debe tener min 6 caracteres
            alert("La contraseña debe tener al menos 6 caracteres.");
            valid = false;
        }

        if (!valid) {
            e.preventDefault();
        }
    });
});