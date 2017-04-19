<?php
  include_once('../config/init.php');
  //include_once($BASE_DIR .'database/users.php');  

  $username = strip_tags($_POST['username']);
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);
  
  return true;
  
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
