<?php


class ArticleController extends Database
{

  public function update(Article $article, $articleId)
  {
    $data = $this->getData($article);

    $sql = "UPDATE article SET name=?, price=?,  depot_id=?, backup=?, article_number=?,  ean=?, notice=? WHERE article_id=?";
    $stmt = $this->connexion->prepare($sql);

    $stmt->bind_param("sdiiissi", $data["name"], $data["price"],  $data["depotId"], $data["backup"],  $data["articleNumber"],  $data["ean"],  $data["notice"], $articleId);
    return $stmt->execute();
  }


  public function insert(Article $article)
  {
    $data = $this->getData($article);

    $sql = "INSERT INTO article(name,price,depot_id,backup,user_id,article_number,ean,notice) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $this->connexion->prepare($sql);

    $stmt->bind_param('sdiiiiss', $data["name"],  $data["price"],  $data["depotId"],  $data["backup"],  $data["userId"],  $data["articleNumber"],  $data["ean"],  $data["notice"]);
    return $stmt->execute();
  }

  private function getData(Article $article)
  {
    return [
      "name" => $article->getName(), "price" => $article->getPrice(),
      "depotId" => $article->getDepotId(), "backup" => $article->isBackup(),
      "articleNumber" => $article->getArticleNumber(), "ean" => $article->getEan(),
      "notice" => $article->getNotice(), "userId" => $article->getUserId(),
    ];
  }

  public function getArticleByIdOrName( $article_id, $articleName)
  {
    $sql = " SELECT article.article_id, name, article.price,
    depot.description, article.backup, article.user_id,
    Sum(stock.quantity) As quantity FROM article
    INNER JOIN stock ON stock.article_id = article.article_id
    INNER JOIN depot ON depot.depot_id = article.depot_id
    WHERE article.name = ? OR article.article_id=?
    GROUP BY article_id";
    $stmt = $this->connexion->prepare($sql);
    $stmt->bind_param("si", $articleName, $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }


  public function getArticleById($article_id)
  {
    $sql = " SELECT  article.*, depot.description FROM article INNER JOIN depot ON article.depot_id = depot.depot_id WHERE article_id=? ";
    $stmt = $this->connexion->prepare($sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_array();
  }

  public function fetchAllArticle()
  {
    return $this->select("article");
  }

  public function fetchAllDepot()
  {
    return $this->select("depot");
  }
}
