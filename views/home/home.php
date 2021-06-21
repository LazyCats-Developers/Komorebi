<?php
  include('../templates/header.php');
?>
  <body>
    <title>Komorebi</title>
<?php
  include('../templates/navbar.php');
?>
    <main class="flex bg-gray-100">
      <?php
        include('../templates/dashboard.php');
      ?>
        <div class="w-full overflow-x-hidden border-t flex flex-col">
          <h1>Menu inicial</h1>
            <main class="w-full flex-grow p-6">
              <slot>1</slot>
            </main>
        </div>
      </div>
    </main>
<?php
  require_once('../templates/footer.php');
?>
