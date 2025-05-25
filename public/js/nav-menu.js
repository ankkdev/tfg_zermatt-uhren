/* 
Al pulsar sobre el boton #boton-menu, activa el evento, por defecto el menu en dispositivos moviles esta oculto porque tiene la clase hidden.
Cuando se pulsa sobre el boton, si el menu esta oculto,se muestra y viceversa.
*/
document.getElementById("boton-menu").addEventListener('click', function () {
    const navbar = document.getElementById("navbar-sticky");
    navbar.classList.toggle("hidden");//Alternar la visibilidad del menu
});
