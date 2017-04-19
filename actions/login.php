<?php
  include_once('../config/init.php');
  include_once('../database/users.php');  

  $response = array();

  if (!$_POST['username'] || !$_POST['password']) {
    $response["status"] = "false";
    echo json_encode($response);
    exit;
  }

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  if (loginCorrect($username, $password)) {
    $_SESSION['username'] = $username;
    if (isAdmin($username)) {
       $_SESSION['admin'] = true;
    }

    $response["status"] = "true";
  }
  else {
    $response["status"] = "false";
  }

  echo json_encode($response);
?>

