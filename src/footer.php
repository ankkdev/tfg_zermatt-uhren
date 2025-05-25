<footer class="bg-gray-700 p-24">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Tres contenedores -->
            <div class="flex flex-col md:flex-row justify-between w-full md:pl-8">
                <!-- Logo -->
                <div class="mb-4 md:mb-0 md:mr-8">
                    <a href="/zermatt-uhren/index.php"><img src="/zermatt-uhren/public/img/branding/logotipo/logo-WHITE-_nbk.png"
                            alt="Logo de la empresa"
                            class="max-w-full h-auto object-contain w-40"></a>
                </div>
                <!-- Redes Sociales -->
                <div class="text-white text-sm mb-4 md:mb-0">
                    <h3 class="font-bold mb-2">Siguenos</h3>
                    <ul>
                        <li><a href="https://www.linkedin.com/in/ankkdev/" target="blank" class="hover:underline">Perfil linkedin</a></li>
                    </ul>
                </div>
                <!-- Legales -->
                <div class="text-white text-sm mb-4 md:mb-0 md:ml-8">
                    <h3 class="font-bold mb-2">Legales</h3>
                    <ul>
                        <li><a href="/zermatt-uhren/legal/privacidad.php" target="_blank" class="hover:underline">Política de privacidad</a></li>
                        <li><a href="/zermatt-uhren/legal/cookies.php" target="_blank" class="hover:underline">Cookies</a></li>
                        <li><a href="/zermatt-uhren/legal/aviso-legal.php" target="_blank" class="hover:underline">Aviso legal</a></li>
                    </ul>
                </div>
                <!-- Preguntas Frecuentes -->
                <div class="text-white text-sm md:ml-8">
                    <h3 class="font-bold mb-2">Preguntas Frecuentes</h3>
                    <ul>
                        <li><a href="/zermatt-uhren/cambios-devo.php" target="_blank" class="hover:underline">Cambios y devoluciones</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="mt-4"><!-- Boton eliminar cookies-->
        <button id="deleteCookiesBoton" class="bg-red-500 hover:bg-red-600 text-white px-4 rounded">Eliminar Cookies</button>
    </div>
    <div class="text-center text-white mt-8">
        <p>Todos los derechos reservados © <span id="currentYear"></span> - Zermatt uhren.</p>
    </div>
</footer>
<script>
    document.getElementById("deleteCookiesBoton").addEventListener("click", function() { //Con ello eliminamos las cookies con el DOM
        document.cookie = "sort=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        alert("Cookies eliminadas.");
    });
    document.addEventListener("DOMContentLoaded", function() { //obtener año actual
        document.getElementById("currentYear").textContent = new Date().getFullYear();
    });
</script>