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

        <table id="fresh-table" class="table">
          <thead>
            <th data-field="id">ID</th>
            <th data-field="name" data-sortable="true">Name</th>
            <th data-field="salary" data-sortable="true">Tallage</th>
            <th data-field="country" data-sortable="true">Country</th>
            <th data-field="city">Conpany</th>
            <th data-field="actions"</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Бешеные псы</td>
              <td>$36,738</td>
              <td>США</td>
              <td>Мирамакс</td>
              <td></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Четыре комнаты</td>
              <td>$23,789</td>
              <td>США</td>
              <td>Интертеймант</td>
              <td></td>
            </tr>
            <tr>
              <td>3</td>
              <td>От заката до рассвета</td>
              <td>$56,142</td>
              <td>США</td>
              <td>Мирамакс</td>
              <td></td>
            </tr>
            <tr>
              <td>4</td>
              <td>Солнцестояние</td>
              <td>$38,735</td>
              <td>Швеция</td>
              <td>Overland Park</td>
              <td></td>
            </tr>
            <tr>
              <td>5</td>
              <td>Омерзительная восьмерка</td>
              <td>$63,542</td>
              <td>США</td>
              <td>Мирамакс</td>
              <td></td>
            </tr>
            <tr>
              <td>19</td>
              <td>Бесславные ублюдки</td>
              <td>$64,436</td>
              <td>Германия, США</td>
              <td>The Weinstein Company</td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>


    </div>
  </div>
</div>
</div>

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
