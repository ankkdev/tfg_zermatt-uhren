<nav class="bg-white dark:bg-gray-100 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
    <a href="/zermatt-uhren/index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="/zermatt-uhren/public/img/branding/logotipo/logo_nbk.png" class="h-22" alt="Flowbite Logo">
    </a>
  <div class="flex md:order-2 items-center gap-3 rtl:space-x-reverse p-1">
  <?php if (session_status() === PHP_SESSION_NONE) {
      session_start();
    } ?>
  <?php if (isset($_SESSION['user'])): ?>
      <a href="/zermatt-uhren/src/controllers/auth/logout.php" class="text-white bg-gray-700 hover:bg-gray-100 
         focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-700
         dark:hover:bg-gray-500 dark:focus:ring-blue-800">Cerrar sesión</a>
      <?php if ($_SESSION['user']['role'] === 'admin'): ?>
          <a href="/zermatt-uhren/src/controllers/admin-panel.php" class="text-white bg-gray-700 hover:bg-gray-100 
             focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center
             dark:bg-gray-700 dark:hover:bg-gray-500 dark:focus:ring-blue-800">Panel Admin</a>
      <?php endif; ?>
  <?php else: ?>
      <a href="/zermatt-uhren/src/controllers/auth/form-login.php" 
         class="inline-flex items-center text-white bg-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-gray-700
         dark:hover:bg-gray-500 dark:focus:ring-blue-800">
           <img src="/zermatt-uhren/public/img/svg/user-plus-w.svg" alt="Icono de usuario" class="w-5 h-5">
           Iniciar sesión
      </a>
  <?php endif; ?>
  <button id="boton-menu" data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
    <img src="/zermatt-uhren/public/img/svg/menu.svg" alt="Icono de menú" class="w-5 h-5">
  </button>
</div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-white md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  md:dark:bg-gray-100">
        <li>
          <a href="/zermatt-uhren/index.php" class="block py-2 px-3 text-gray-900 rounded-sm md:bg-transparent md:text-gray-700 md:p-0 md:dark:text-gray-700 dark:hover:text-gray-500" aria-current="page">INICIO</a>
        </li>
        <li>
          <a href="/zermatt-uhren/colecciones.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 m1d:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-gray-500 dark:text-black dark:hover:bg-gray-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">COLECCIONES</a>
        </li>
        <li>
          <a href="/zermatt-uhren/marca.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-gray-500 dark:text-black dark:hover:bg-gray-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">MARCA</a>
        </li>
        <li>
          <a href="/zermatt-uhren/servicios.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-gray-500 dark:text-black dark:hover:bg-gray-500 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">SERVICIOS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="/zermatt-uhren/public/js/nav-menu.js"></script>