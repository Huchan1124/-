<?php 
include_once("../base.php");

$total = $_POST['total'];
//把我們接收到的值，傳送到資料庫去做修改
$Total->save(['id'=>1,'total'=>$total]);

//導回原頁 
to("../backend.php?do=total");




?> 