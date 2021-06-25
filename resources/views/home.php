<?php
  include('header.php');
?>
<title>Komorebi</title>
<?php
  include('navbar.php');
?>
<?php
  include('dashboard.php');
?>
<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow md:p-6">
     <!-- Contenido de la web -->

    <div class ="px-5 py-5 flex flex-col items-center space-y-5 md:bg-white md:rounded-xl">
    <p>
      Estamos trabajando para usted
    </p>
      <img class="w-full xl:w-1/2 rounded-xl" src="../img/working.gif" alt="">
    </div>
  </main>
</div>
<?php
  require_once('footer.php');
?>
