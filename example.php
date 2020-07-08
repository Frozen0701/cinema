<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Управление скоростью обратного переходного эффекта</title>
<style>
div {
display: inline-block; /* элементы становятся блочно-строчными (выстраиваем в линейку) */
width: 100px; /* ширина элемента */
height: 100px; /* высота элемента */
background-color: pink; /* устанавливаем цвет заднего фона */
margin-right: 25px; /* внешний отступ с правой стороны */
text-align: center; /* выравнивание текста по центру */
transition-duration: 5s; /* продолжительность переходного эффекта 5 секунд */
}
.test1:hover {
transition-duration: .5s; /* продолжительность переходного эффекта 0,5 секунды */
background-color: rgb(0,0,255); /* устанавливаем цвет заднего фона при наведении на элемент */
}
.test2:hover {
transition-duration: 1s; /* продолжительность переходного эффекта 1 секунда */
background-color: rgb(0,0,255); /* устанавливаем цвет заднего фона при наведении на элемент */
}
.test3:hover {
transition-duration: 1.5s; /* продолжительность переходного эффекта 1,5 секунды */
background-color: rgb(0,0,255); /* устанавливаем цвет заднего фона при наведении на элемент */
}
.test4:hover {
transition-duration: 2s; /* продолжительность переходного эффекта 2 секунды */
background-color: rgb(0,0,255); /* устанавливаем цвет заднего фона при наведении на элемент */
}
.test5:hover {
transition-duration: 2.5s; /* продолжительность переходного эффекта 2,5 секунды */
background-color: rgb(0,0,255); /* устанавливаем цвет заднего фона при наведении на элемент */
}
</style>
</head>
	<body>
		<div class = "test1">0.5s hover<br>5s element</div>
		<div class = "test2">1s hover<br>5s element</div>
		<div class = "test3">1.5s hover<br>5s element</div>
		<div class = "test4">2s hover<br>5s element</div>
		<div class = "test5">2.5s hover<br>5s element</div>
	</body>
</html>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Личный сайт студента GeekBrains</title>
  <link rel="stylesheet" href="style.css">
  <style type="text/css">
  p1:hover {
    color: #93aa00; /* Цвет ссылки при наведении на нее курсора мыши */
    text-decoration: underline; /* Добавляем подчеркивание */
  }
</style>
</head>

<?php include ("header.html")?>
<br>
<br>
<br>
<br>
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="https://bootstraptema.ru/snippets/element/2020/bootstrap-table.css" rel="stylesheet" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/snippets/element/2020/bootstrap-table.js"></script>

<div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="fresh-table toolbar-color-blue">

          <!-- Изменение фона таблицы: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
          Изменение фона тулбара страницы: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
        -->

        <div class="toolbar">
          <button id="alertBtn" class="btn btn-default">Alert</button>
        </div>
				<?php
				error_reporting(E_ALL);
				ini_set('display_errors', 'on');

				$servername = "localhost"; // адрес сервера
				$username = "mysql"; // имя пользователя
				$password = "mysql"; // пароль
				$database = 'cinemasite';


				$link = mysqli_connect($servername, $username, $password, $database);
				mysqli_query($link, "SET NAMES 'utf8'");

				$query = "SELECT * FROM  film";

				$result = mysqli_query($link,$query) or die(mysqli_error($link));

				for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

				//var_dump($data); проверка и вывод всего вообще как массив
				?>
        <table id="fresh-table" class="table">

					<form method="GET">
			 	  <table>

			 	    <tr><th>id</th><th>Имя пользователя</th><th>Почта</th></tr>
			 	    <?php foreach ($data as $accounts) { ?>

			 	    <tr>
			 	      <td><?= $film['id'] ?></td>
			 	      <td><?= $film['name'] ?></td>
			 	      <td><?= $film['salary'] ?></td>
							<td><?= $film['country'] ?></td>
							<td><?= $film['city'] ?></td>
			 	    </tr>
			 	    <?php } ?>
			 	  </table>
			 	   </form>

<script>
var $table = $('#fresh-table'),
$alertBtn = $('#alertBtn'),
full_screen = false;

$().ready(function(){
  $table.bootstrapTable({
    toolbar: ".toolbar",


    search: true,
    showToggle: true,
    pagination: true,
    striped: true,
    pageSize: 8,
    pageList: [8,10,25,50,100],

    formatShowingRows: function(pageFrom, pageTo, totalRows){
      //do nothing here, we don't want to show the text "showing x of y from..."
    },

  });



  $(window).resize(function () {
    $table.bootstrapTable('resetView');
  });


  window.operateEvents = {
    'click .like': function (e, value, row, index) {
      alert('You click like icon, row: ' + JSON.stringify(row));
      console.log(value, row, index);
    },
    'click .edit': function (e, value, row, index) {
      alert('You click edit icon, row: ' + JSON.stringify(row));
      console.log(value, row, index);
    },
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      });

    }
  };

  $alertBtn.click(function () {
    alert("You pressed on Alert");
  });

});


function operateFormatter(value, row, index) {
  return [
    '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
    '<i class="fa fa-heart"></i>',
    '</a>',
    '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
    '<i class="fa fa-edit"></i>',
    '</a>',
    '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
    '<i class="fa fa-remove"></i>',
    '</a>'
  ].join('');
}


</script>
