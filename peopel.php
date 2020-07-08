<head>
    <meta charset="utf-8">
    <title>Все зарегистрированные пользователи </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="content">
      <?php include ("header.html")?>
<style>
table{
  width: 300px;
  margin: auto;
  margin-top: 80px;
  font-size: 20px;
  font-weight: 70%;
  background: #b5b7ba; /* Цвет фона */
}
td{
  background: #dfdfdf; /* Цвет фона */
  border-style: inset; /* Стиль линии вокруг параграфа */
  padding: 5px; /* Поля вокруг текста */
  text-align: center;
  color: #4d4d4d;
  text-decoration: none;
  font-size: 20px;
  font-weight: 70%;
  margin-bottom: 40px;
}
</style>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$servername = "localhost"; // адрес сервера
$username = "mysql"; // имя пользователя
$password = "mysql"; // пароль
$database = 'cinemasite';


$link = mysqli_connect($servername, $username, $password, $database);
mysqli_query($link, "SET NAMES 'utf8'");

$query = "SELECT * FROM  accounts";

$result = mysqli_query($link,$query) or die(mysqli_error($link));

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

//var_dump($data); проверка и вывод всего вообще как массив
?>
 <form method="GET">
  <table>

    <tr><th>id</th><th>Имя пользователя</th><th>Почта</th></tr>
    <?php foreach ($data as $accounts) { ?>

    <tr>
      <td><?= $accounts['id'] ?></td>
      <td><?= $accounts['username'] ?></td>
      <td><?= $accounts['email'] ?></td>
    </tr>
    <?php } ?>
  </table>
   </form>



</div>
<div id="footer">Copyright © 2020 <a href="" target="_blank"></a></div>
</body>
