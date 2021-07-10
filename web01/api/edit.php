<?php 
include_once "../base.php";

$texts = $_POST['text'];
$ids=$_POST['id'];
echo "<pre>";
print_r($texts);
print_r($ids);


foreach ($ids as $key => $id){
    // 取出相對應id的資料
    $row = $Title->find($id);
    echo "<pre>";
    print_r($row);
    // 取出元資料的text 置換成 $texts的資料
    $row['text'] = $texts[$key];
    print_r($row['text']);
    // 更換完畢後儲存回DB
    $Title->save($row);
}


?>