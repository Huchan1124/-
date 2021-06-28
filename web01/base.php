<?php

class DB {
    //db基本設定
    private $dsn = "mysql:host=localhost;charset=utf8;dbname=db_test";
    private $db_username = "root";
    private $db_password = "";
    private $table;
    private $db_connection;
    
    //建構函式 initial
    public function __construct($table){
        //資料表
        $this->table = $table;
        //db連線 
        $this->db_connection = new PDO($this->dsn,$this->db_username,$this->db_password);
    
    }

    public function all(...$arg){
        //sql語法
        $sql = "SELECT * FROM $this->table";
        //執行sql語法 並回傳結果(陣列形式)
        return $this->db_connection->query($sql)->fetchAll();

    }
}

//new一個DB，取出test_score資料表
$db = new DB("test_score");

echo "<pre>";
//print_r() 輸出陣列的語法
print_r($db->all());
echo "</pre>";


?>