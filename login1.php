<?php
session_start();
$output = NULL;

$servername = "localhost"; // адрес сервера
$username = "mysql"; // имя пользователя
$password = "mysql"; // пароль
$database = 'cinemasite';

//check form
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
      $output = "Invalid username or password";//посмотреть как выводить на новую строку
    }else{
      //connect to //
      $mysqli = new MySQLi('localhost','mysql','mysql','cinemasite');

      $username = $mysqli->real_escape_string($username);
      $password = $mysqli->real_escape_string($password);

      $query = $mysqli ->query("SELECT id FROM accounts WHERE username =
        '$username' AND  password = '$password'");

        if($query-> num_rows == 0){
          $output .= "Invalid username or password";
        }else {
          // user logged in successfully
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['user'] = $username;

          $output = "WELCOM " .$_SESSION['user'] ."!";
        }
    }
  }

if(!isset($_SESSION['loggedin'])){
  echo  "WELCOM Guest  . <p>   </p>";
}
echo $output;
?>
<?php include ("header.html")?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<html>
<head>
  <meta charset="utf-8">
  <title>Вход</title>
  <link rel="stylesheet"type="text/css" href="css\style_reg.css">
</head>
<body>
  <div class="container">
    <section id="content">
      <div id="frm">
        <form  method="POST">
          <h1>Login Form</h1>
          <div>
            <input type="text" id="username" name="username" placeholder="Enter the User Name"/>
          </div>
          <div>
            <input type="password" id="password" name="password"placeholder="Password"/>
          </div>
          <div>
            <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
            <a href="#">Lost your password?</a>
            <a href="check.php">Register</a>
          </div>
        </form>
      </section><!-- content -->
    </div>
  </body>
  </html>
