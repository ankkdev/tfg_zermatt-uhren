/* 
Definir variables para obtener el contenedor del slider y sus imagenes,junto con su imagen actual y total,
luego define funciones para mostrar una imagen,avanzar y retroceder.
Para dispositivos moviles o tablet,gestioneel toque (guardando la posición al iniciar y comparandola al terminar),
de modo que si la diferencia horizontal supera 50px,entonces cambia la imagen,ademas previene el arrastre por defecto
de las imagenes,y en escritorio,usa mousedown para iniciar el arrastre,mousemove para actualizar la posicion y 
moseup para calcular la diferencia y activar el cambio de imagen si el desplazamiento es suficiente.
*/

$(document).ready(function () {
    var $slider = $('#slider');
    var $imgs = $slider.find('img');
    var currentIndex = 0;
    var imgCount = $imgs.length;
    var startX = 0;

    function showImage(index) {
        $imgs.removeClass('active');
        $imgs.eq(index).addClass('active');
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % imgCount;
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + imgCount) % imgCount;
        showImage(currentIndex);
    }

    //ssoporte táctil (dispositivos móviles)
    $slider.on('touchstart', function (e) {
        startX = e.originalEvent.touches[0].clientX;
    });

    $slider.on('touchend', function (e) {
        var endX = e.originalEvent.changedTouches[0].clientX;
        var diffX = startX - endX;
        if (Math.abs(diffX) > 50) { // umbral de 50px
            diffX > 0 ? nextImage() : prevImage();
        }
    });

    $slider.find('img').on('dragstart', function (e) {
        e.preventDefault();
    });

    //soporte para mouse en escritorio arrastrando con el ratón
    var isDragging = false;
    var dragStartX = 0;
    var dragEndX = 0;

    $slider.on('mousedown', function (e) { //al presionar
        isDragging = true;
        dragStartX = e.pageX;
    });

    $slider.on('mousemove', function (e) { //deslizando (raton se mueve aun presionando boton)
        if (isDragging) {
            dragEndX = e.pageX;
        }
    });
    /* cuando se hace el mouseup (soltar boton del raton),si no arrastra,no hace nada,si lo hace,desactiva
     isDragging,calcula la diferencia horizontal entre el puebo de donde se inciio el arrastre (dragStarx)
      y de donde se solto (dragEndX), si la diferencia en valor absouluto es mayor que 50px,se detecta su 
      deslizamient,si la diferencia es positiva,llama a nextImage(),en caso contrario,llama al prevImage(); */
    $(document).on('mouseup', function (e) {
        if (!isDragging) return;
        isDragging = false;
        var diffX = dragStartX - dragEndX;
        if (Math.abs(diffX) > 50) {
            diffX > 0 ? nextImage() : prevImage();
        }
    });
});