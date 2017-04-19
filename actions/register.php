<?php
  include_once('../config/init.php');
  //include_once($BASE_DIR .'database/users.php');  

/*
  $username = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
*/
  $response = array("status" => "true");

  echo json_encode($response);
  
  /*
  try {
    createUser($username, $name, $email, $password);
  } catch (PDOException $e) {
  
    if (strpos($e->getMessage(), 'users_pkey') !== false) {
      $_SESSION['error_messages'][] = 'Duplicate username';
      $_SESSION['field_errors']['username'] = 'Username already exists';
    }
    else $_SESSION['error_messages'][] = 'Error creating user';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }
  $_SESSION['success_messages'][] = 'User registered successfully';  
  header("Location: $BASE_URL");
  */
?>
