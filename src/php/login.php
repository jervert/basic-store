<?php

return function () {
  $config = include 'config.php';
  $db = new PDO(
    $config['DSN'],
    $config['USERNAME'],
    $config['PASSWORD']
  );

  $result = $db->query("SELECT email,password FROM `customers` WHERE email='" . $_POST['login-email'] . "'");
  $dataResult = $result->fetchAll(PDO::FETCH_CLASS);
  $numberResults = $result->rowCount();
  $result->closeCursor();
  $db = null;

  if ($numberResults > 0) {
    if (password_verify($_POST['login-password'], $dataResult[0]->password)) {
      $_SESSION["login"] = true;
      $_SESSION["userid"] = $dataResult[0]->email;
      header("Location: /");
    } else {
      $_SESSION['loginMessage'] = 'loginError';
      header("Location: /acceso");
    }
  } else {
    $_SESSION['loginMessage'] = 'loginError';
    header("Location: /acceso");
  }
};
