<?php
  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <?php
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">Stock database</p>';
          }
          else if (isset($_SESSION['id'])) {
            header('Location:loggedinAJAX.php');
          }
          ?>
        </section>
      </div>
    </main>

