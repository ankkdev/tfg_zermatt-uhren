<nav class="bg-white dark:bg-gray-100 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
    <a href="/zermatt-uhren/index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="/zermatt-uhren/public/img/branding/logotipo/logo_nbk.png" class="h-22" alt="Flowbite Logo">
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <?php
      if (session_status() === PHP_SESSION_NONE) { //si no hay ninguna sesion, se inicia
        session_start();
      }
      if (isset($_SESSION['user'])) {
        echo '<a href="/zermatt-uhren/src/controllers/auth/logout.php" class="text-white bg-gray-700 hover:bg-gray-100 
        focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-700
         dark:hover:bg-gray-500 dark:focus:ring-blue-800">Cerrar sesión</a>';
        if ($_SESSION['user']['role'] === 'admin') {
          echo '<a href="/zermatt-uhren/src/controllers/admin-panel.php" class="text-white bg-gray-700 hover:bg-gray-100 
          focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center
           dark:bg-gray-700 dark:hover:bg-gray-500 dark:focus:ring-blue-800 ml-1">Panel Admin</a>';
        }
      } else {
        echo '<a href="/zermatt-uhren/src/controllers/auth/form-login.php" 
        class="text-white bg-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-700
         dark:hover:bg-gray-500 dark:focus:ring-blue-800">Iniciar sesión</a>';
      }
      ?>
      <button id="boton-menu" data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-white md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-700 md:dark:bg-gray-100 dark:border-gray-700">
        <li>
          <a href="/zermatt-uhren/index.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-gray-700 md:p-0 md:dark:text-gray-700" aria-current="page">INICIO</a>
        </li>
        <li>
          <a href="/zermatt-uhren/" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-gray-500 dark:text-black dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">MARCA</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-gray-500 dark:text-black dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">SERVICIOS</a>
        </li>
        <li>
          <a href="/zermatt-uhren/colecciones.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-gray-500 dark:text-black dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">COLECCIONES</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="/zermatt-uhren/public/js/nav-menu.js"></script>