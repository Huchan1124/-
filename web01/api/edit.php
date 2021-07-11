<?php 
include_once "../base.php";

$texts = $_POST['text'];
$ids=$_POST['id'];
// 決定我拿到的資料表為何
$table = $_POST['table'];
$db = new DB($table);


foreach ($ids as $key => $id){
    // 判斷刪除 如果$_POST['del']刪除的陣列存在且  id有在$_POST['del']裡面
    if (isset($_POST['del']) && in_array($id,$_POST['del'])){
        $db->del($id);
    } else {
    // 執行edit動作
    // 取出相對應id的資料
    $row = $db->find($id);
  
    // 取出元資料的text 置換成 $texts的資料
    $row['text'] = $texts[$key];
    
    // 根據table的不同來做判斷
    switch($table){
        case 'title';
               // 顯示功能 單選 如果$_POST['sh']存在且 $_POST['sh']==$id true回傳1(顯示) false回傳0(不顯示)
               $row['sh'] = (isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
        break;
        default:
               //顯示功能  多選    
               $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            
    }

    // 更換完畢後儲存回DB
    $db->save($row);
    }  
}



to("../backend.php?do=".$table);

?>