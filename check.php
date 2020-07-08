<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>Регистрация </title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="css\style_check.css">
 </head>
 <body>
     <div id="content">

            <?php include ("header.html")?>
             <?php
             $servername = "localhost"; // адрес сервера
             $username = "mysql"; // имя пользователя
             $password = "mysql"; // пароль
             $database = 'cinemasite';
             //Connect to SQLiteDatabase
             $mysqli = new MySQLi($servername, $username, $password,  $database);
             if ($mysqli->connect_error){
               die("No". $mysqli->connect_error);
             }
            //посмотреть потом, как в .center ты выесла в div class
           echo "<span style ='width: 100%;
           float: left;
           text-align: center;
           color: #93aa00;
           font-size: 20px;
           font-weight: 300px;
           margin-top: 30px;
           margin-bottom: 7px;'= >Вы успешно подключились к базе данных кинотетра!</span>";

               if(isset($_POST['submit'])){

                 $username = $mysqli->real_escape_string($_POST['username']);
                 $password = $mysqli->real_escape_string($_POST['password']);
                 $rpassword = $mysqli->real_escape_string($_POST['rpassword']);
                 $email =  $mysqli->real_escape_string($_POST['email']);

                 $query = $mysqli->query("SELECT * FROM accounts WHERE username = '$username'");

                 if(empty($username) OR empty($password) OR empty($email) OR empty($rpassword)){
                   $output = "Please fill in all fields.";
                 }
                 elseif($query->num_rows != 0){
                   $output = "That username is already taken.";
                 }
                 elseif($rpassword != $password){
                   $output = "Your password don't match.";
                 }
                 elseif(strlen($password) < 3){
                   $output = "You password must be at least 3 characters.";
                 }
                 else {
                   //password
                   //$password = md5($password);

                   //Insert the record
                   $insert = $mysqli->query("INSERT INTO accounts ( username, password, email)
                    VALUES('$username','$password', '$email')");
                   if ($insert != TRUE){
                     $output = "Problem";
                     $output .= $mysqli->error;
                   }else{
                     $output = "Your have been registred!";
                   }
                 }
               }
             ?>

            <div id="center">
             <form method="POST">


             <table width="300" border="1" style='position:relative; top:30%; left:39%;'>
             <tr>
               <td>Username:</td>
               <td><input type="TEXT" name="username"  /></td>
             <tr>
             <tr>
               <td> Password: </td>
               <td><input type="TEXT" name="password"  /></td>
             <tr>
             <tr>
               <td>Repeat Password:</td>
               <td><input type="TEXT" name="rpassword"  /></td>
             <tr>
             <tr>
               <td>Email Address: </td>
               <td><input type="TEXT" name="email"  /></td>
             <tr>
             </table>
            </div>

             <div class = "center">
               <form action=" https://login1.php" method="post">
                 <input type="submit" value="Вход" />
               </form>
             <input type="submit" name="submit" value="Зарегистироваться!" /></div>
             </form>

             <?php
              echo $output;
              ?>
     </div>
     <div id="footer">Copyright © 2020 <a href="" target="_blank"></a></div>
 </body>

 </html>
