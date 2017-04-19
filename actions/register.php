<?php
  include_once('../config/init.php');
  include_once('../database/users.php');  

  $response = array();


  if (!$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['password']) {
    $response["status"] = "false";
    echo json_encode($response);
    exit;
  }

  $username = strip_tags($_POST['username']);
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);

  try {
    createUser($username, $name, $email, $password);
    $response["status"] = "true";
    echo json_encode($response);
    exit;
  } catch (PDOException $e) {
    $response["status"] = $e->getMessage();
    echo json_encode($response);
    exit;
  }
?>
