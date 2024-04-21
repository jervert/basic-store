<?php

return function () {
  $config = include 'config.php';
  $validEmail = filter_var($_POST["useremail"], FILTER_VALIDATE_EMAIL);

  if ($validEmail and $_POST['userpass1'] === $_POST['userpass2'] and strlen($_POST['userpass1']) > 6) {
    if (isset($_POST['useremail']) && isset($_POST['userpass1'])) {
      $db = new PDO(
        $config['DSN'],
        $config['USERNAME'],
        $config['PASSWORD']
      );
      $db->query("INSERT INTO `customers` (`email`, `password`,`cart`) VALUES ('" . $_POST['useremail'] . "', '" . password_hash($_POST['userpass1'], PASSWORD_DEFAULT) . "', '{}') ");
      $db = null;
    }
    $_SESSION['loginMessage'] = 'signupSuccess';
  } else {
    $_SESSION['loginMessage'] = 'signupError';
  }
  header("Location: /acceso");
};
