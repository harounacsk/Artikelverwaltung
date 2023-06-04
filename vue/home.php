<!DOCTYPE html>
<html lang="de">

<head>
  <title>Willkommen</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/w3.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <link rel="stylesheet" type="text/css" href="../css/suchform.css">
  <link rel="stylesheet" type="text/css" href="../css/resp_table.css">

</head>

<body>

  <?php
  require_once "auth.php";
  require_once "nav.php";
  require_once "../php/model/Article.php";
  require_once "../php/controller/ArticleController.php";

  ?>
  <aside class="aside_width">
    <br>
    <center>
      <form method="get" action="">
        <i>Suche: </i><input type="text" list="artikel" name="_article_name" placeholder="Artikel eingeben" required />
        <button class="w3-btn" type="submit" name="suchen">
          <i><img class="search" src="../img/search.png"></i>
        </button>

        <datalist id="artikel">
          <?php
          $articleController = new ArticleController();
          $artilces = $articleController->fetchAllarticle();

          foreach ($artilces as $artilce) :
            echo "<option value='" . $artilce["name"] . "'>";
          endforeach;
          
          ?>
        </datalist>

        <br>
      </form>
      <?php

      $articleName = "";
      $articleId="";

      if (!empty($_GET["_article_id"])) :
        $articleId = $_GET["_article_id"];
      endif;

      if (!empty($_GET["_article_name"])) :
        $articleName = trim($_GET["_article_name"]);
      endif;

      if (!empty($articleName) || !empty($articleId)) :
        if (!empty($rows = $articleController->getArticleByIdOrName($articleId, $articleName))) : ?>
          <h4 align="right"><i>Artikelliste</i></h4>
          <table>
            <thead>
              <tr>
                <th>Artikel Nr</th>
                <th>Artikelname</th>
                <th>Preis</th>
                <th>Lagertyp</th>
                <th>Back up</th>
                <th>Menge</th>
                <th>Bearbeiten</th>
                <th>Preise</th>
                <th>Neuer Preis</th>
              </tr>
            </thead>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <td data-label="Artikel Nr"><?= $row['article_id'] ?></td>
                <td data-label="Artikelname"><?= $row['name'] ?></td>
                <td data-label="Preis"><?= ArticleController::getPriceformat($row['price']) ?></td>
                <td data-label="Lagertyp"><?= $row['description'] ?></td>
                <td data-label="Back up"><?= ($row['backup'] == 1) ? "Ja" : "Nein" ?></td>
                <td data-label="Menge"><?= $row['quantity'] ?></td>
                <td data-label="Bearbeiten"><a href="<?= "article.php?_article_id=" . $row['article_id'] ?>"><img class="img_icon" src="../img/modify.png" alt="" srcset=""></td>
                <td data-label="Preise"><a href="<?= "result_price.php?_article_id=" . $row['article_id'] ?>"><img class="img_icon" src="../img/look.png" alt="" srcset=""></td>
                <td data-label="Neuer Preis"><a href="<?= "article_supplier.php?_article_id=" . $row['article_id'] ?>"><img class="img_icon" src="../img/add.png" alt="" srcset=""></td>
              </tr>
            <?php endforeach; ?>
          </table>

        <?php else : ?>
          <center>
            <br><i>
              <h4>
                Der eingegebene Artikel: <b><span>
                    <font color="#DC143C"><?= $articleName ?></font>
                  </span> </b> ist nicht in der Wareneingang und vielleicht auch befindet sich nicht im System.
              </h4>
            </i>
          </center>
      <?php
        endif;
        $articleController->dbClose();
      endif;
      ?>
    </center>
  </aside>
</body>

</html>