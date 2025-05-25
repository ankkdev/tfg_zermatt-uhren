document.addEventListener('DOMContentLoaded', function () {
    const formRegistrar = document.getElementById('form-register');//capturar el formulario correspondiente
    if (!formRegistrar) return;//si no se encuentra el formulario,lo detiene
    formRegistrar.addEventListener('submit', function (e) {
        let valido = true;
        const nameField = document.getElementById('name');
        const emailField = registerForm.querySelector('input[name="email"]');
        const passwordField = document.getElementById('pswd');

        const expresionReg = /^[A-Za-z0-9À-ÖØ-öø-ÿ\s]+$/; //validar el username con letras numeros y espacios
        if (!expresionReg.test(nameField.value.trim())) {
            alert("Nombre inválido: Solo se permiten letras, numeros y espacios.");
            valid = false;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;//validar correo electronico

        if (!emailRegex.test(emailField.value.trim())) {
            alert("Correo inválido.");
            valid = false;
        }

        if (passwordField.value.length < 6) {//la contaseña debe tener minimo 6 caracteres
            alert("La contraseña debe tener al menos 6 caracteres.");
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); //cancela el envío si hay algún error
        }
    });
});