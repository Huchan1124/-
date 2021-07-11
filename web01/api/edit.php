<?php 
include_once "../base.php";

$texts = $_POST['text'];
$ids=$_POST['id'];
echo "<pre>";
print_r($texts);
print_r($ids);

foreach ($ids as $key => $id){
    // 判斷刪除 如果$_POST['del']刪除的陣列存在且  id有在$_POST['del']裡面
    if (isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Title->del($id);
    } else {
    // 執行edit動作
    // 取出相對應id的資料
    $row = $Title->find($id);
  
    // 取出元資料的text 置換成 $texts的資料
    $row['text'] = $texts[$key];
    // 顯示功能 如果$_POST['sh']存在且 $_POST['sh']==$id true回傳1(顯示) false回傳0(不顯示)
    $row['sh'] = (isset($_POST['sh']) && $_POST['sh']==$id)?1:0;

    // 顯示功能 方法2
    // if(isset($_POST['sh']) && $_POST['sh']==$id){
    //     $row['sh']=1;
    // } else {
    //     $row['sh']=0;
    // }

    // 更換完畢後儲存回DB
    $Title->save($row);
    }  
}

foreach($_POST['del'] as $id){
    $Title->del($id);
}

to("../backend.php?do=title");

?>