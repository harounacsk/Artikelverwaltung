<script src="../js/nav.js"></script>
<?php 	require_once "auth.php";?>
<nav>
  <div class="topnav" id="myTopnav">
    <a class="nav_a" href="home.php">Startseite</a>
    <a class="nav_a" href="article.php">Artikel einfügen</a>
    <a class="nav_a" href="ean.php">Wareneingang</a>
    <a class="nav_a" href="supplier.php">Lieferanten</a>
    <a class="nav_a" href="supplier_detail.php">Lieferanten einfügen</a>
    <?php
    if (UserController::isAdmin()):
      echo '<a class="nav_a" href="users.php">Benutzer</a>';
    endif;
  
    ?>
    <a class="td_none" href="logout.php" id="auslogPosition">Ausloggen</a>
    <a id="resp" href="javascript:void(0);" class="icon"><span class="menu">&equiv;</span></a>
  </div>
</nav>
