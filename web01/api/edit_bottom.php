<?php 
include_once("../base.php");

// $total = $_POST['total'];
//把我們接收到的值，傳送到資料庫去做修改
$Bottom->save(['id'=>1,'bottom'=>$_POST['bottom']]);

//導回原頁 
to("../backend.php?do=bottom");




?> 