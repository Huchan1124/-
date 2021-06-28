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
        //sql語法 記得$sql語法後面要留空格 避免之後字串相連
        $sql = "SELECT * FROM $this->table ";

        //$arg傳進來為陣列形式
        print_r($arg); 

        //$arg=[]，$arg主要是接在$sql語法後，增加搜尋條件。傳進來的資料可能是 [陣列] ,[SQL字串] , [陣列, SQL字串]
        //如果傳進來的值有東西，再繼續判斷(**isset這行好像可以不用加，因為原本透過參數傳進來的本身就會有東西?試過刪掉不影響)
        if (isset($arg[0])){
            //判斷$arg是否為陣列
            if (is_array($arg[0])){
                
                echo "處理陣列";
            } else {
                //$arg為字串，因此接在$sql語法後面
               $sql =  $sql . $arg[0];
               echo $sql; 
            };

        }

         //判斷$arg是否有第二個元素
         if (isset($arg[1])){
             // 接續第一個$sql 將字串加在後面
            $sql = $sql . $arg[1];
            echo $sql;
        }


        //執行sql語法 並回傳結果(陣列形式)
        return $this->db_connection->query($sql)->fetchAll();

    }
}

//new一個DB，取出test_score資料表 class首字通常大寫
$Db = new DB("test_score");

echo "<pre>";
//print_r() 輸出陣列的語法
print_r($Db->all(" WHERE `name` = '李小新' "));

print_r($Db->all(" ORDER BY `id` DESC "));

print_r($Db->all(" WHERE `math` = '100' "," ORDER BY `id` DESC "));
echo "</pre>";



?>