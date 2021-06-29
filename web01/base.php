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
                //要轉成的形式 `col1` = "value1" && `col2` = "value2" 
                //1. 使用foreach 將 陣列一一輸出
                foreach($arg[0] as $key => $value){
                //2. 要將傳進來的陣列參數，轉成字串形式 我們可以用 sprintf(format,arg1,arg2,arg++)
                    $tmp[] = sprintf("`%s` = '%s'",$key,$value);
                }
                print_r($tmp);

                //3. 用&&連接兩個字串，可以使用implode(separator,array) 將陣列用特定字符連接
                //記得" && " 要加空白，不然字串會連在一起
                print_r(implode(" && ",$tmp));

                //4. 連接sql語法與implode，完成我們具有條件限定的sql語法
                //記得要加" WHERE " ，SQL語法才是正確的，不要忘記空白!
                $sql = $sql ." WHERE ". implode(" && ",$tmp);

                // echo $sql;
              
            } else {
                //$arg為字串，因此接在$sql語法後面
               $sql =  $sql . $arg[0];
            //    echo $sql; 
            };

        }

         //判斷$arg是否有第二個元素
         if (isset($arg[1])){
             // 接續第一個$sql 將字串加在後面
            $sql = $sql . $arg[1];
            // echo $sql;
        }


        //執行sql語法 並回傳結果(陣列形式)
        return $this->db_connection->query($sql)->fetchAll();

    }


    public function count(...$arg){
        //count()聚合函數 計算資料總筆數
        $sql = "SELECT COUNT(*) FROM $this->table ";

        //判斷傳進來的參數形式 [陣列] [SQL字串] [陣列,SQL字串]
        //判斷$arg是否存在，存在才繼續執行
        if (isset($arg[0])){
            if(is_array($arg[0])){
                //傳進來的參數為陣列形式，使用forEach一一輸出

                foreach($arg[0] as $key=>$value){
                    //用$tmp變數 將新增的陣列值存起來
                    //傳進來的參數為陣列形式，我們必須把它轉為字串。語法為sprintf()
                   $tmp[] = sprintf("`%s` = '%s'",$key,$value);
                }
                 
                //利用implode() 連接特殊自符與陣列值
                $sql = $sql ." WHERE ".  implode(" && ",$tmp);

            } else {
                //回傳SQL字串
                $sql = $sql . $arg[0];
            };
        };

        if (isset($arg[1])){
            $sql = $sql . $arg[1];
        }

        /*與all()不同的地方 fetchALL() 改成 fetchColumn() ，
        差別在於前者回傳的是陣列形式，後者直接回傳值，在後續解題時取值較為方便。*/
        return $this->db_connection->query($sql)->fetchColumn();

    }
}

//new一個DB，取出test_score資料表 class首字通常大寫
$Db = new DB("test_score");

echo "<pre>";
// print_r($Db->all(['math' => '100' ,'chinese' => '100']));
//print_r() 輸出陣列的語法
// print_r($Db->all());
// print_r($Db->all(" WHERE `name` = '李小新' "));

// print_r($Db->all(" ORDER BY `id` DESC "));

// print_r($Db->all(" WHERE `math` = '100' "," ORDER BY `id` DESC "));

print_r($Db->count());

echo "</pre>";



?>