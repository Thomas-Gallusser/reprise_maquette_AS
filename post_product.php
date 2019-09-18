<?php
  if (isset($_POST['tag']) && isset($_POST['title']) && isset($_POST['comment']) && isset($_POST['price'])) {
      $mysqli = new mysqli("localhost", "root", "","maquette_take") or die("Connect failed: %s\n". $conn -> error);
      $mysqli->query('INSERT INTO `mt_product` (`titre`, `text`, `tag`, `price`, `img`) VALUES ("' . $_POST["title"] . '","' . $_POST["comment"] . '","' . $_POST["tag"] . '","' . $_POST["price"] . '","' . str_replace(" ","+",$_POST["img"]) . '")');
      echo '1';
  } else {
    echo '0';
  }
?>
