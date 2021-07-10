<?php
include_once "../base.php";

$db = new DB($_POST['table']);

// $_FILES 判斷檔案上傳是否成功

if (isset($_FILES['img']['tmp_name'])){
    // 如果檔案有上傳成功，幫我把圖片檔案移到某個資料夾去
    move_uploaded_file($_FILES['img']['tmp_name'], "../img2/".$_FILES['img']['name']);
    // 
    $data['img'] = $_FILES['img']['name'];
}


$data['text']= $_POST['text'];


$db->save($data);

to("../backend.php?do=".$_POST['table']);


?>