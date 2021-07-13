<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                            <!--標題變數  -->
        <p class="t cent botli"><?=$ts[$do];?></p>
        <!-- 原本這裡會有一行target 記得刪掉不然不能成功運作 -->
<form method="post" action="./api/edit.php">
    <table width="100%" class="cent">
    	<tbody>
            <tr class="yel">
               <td width="30%">主選單名稱</td>
               <td width="30%">選單連結網址</td>
               <td width="10%">次選單數</td>
               <td width="10%">顯示</td>
               <td width="10%">刪除</td>
               <td width="10%"></td>
            </tr>
            <?php 
            // 只顯示主選單(請撈parent==0的資料)
            $rows = $Menu->all(['parent'=>0]);
            foreach ($rows as $key=>$value) {
                ?>
            <tr >
            <td >
                <input type="text" name="text[]" value="<?=$value['text']?>" style="width:90%;">
            </td>
            <td >
                <input type="text" name="href[]" value="<?=$value['href'];?>" style="width:90%;">
            </td>
            <td>
                <!-- 次選單次數，請幫我計算parent欄位有幾個id一樣的 就是他(主選單底下)的次選單數量 -->
                <?=$Menu->count(['parent'=>$value['id']]);  ?>

            </td>
            <td >
                <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?= ($value['sh']==1) ? 'checked': "";?>
            </td>
            <td >
                <input type="checkbox" name="del[]" value="<?=$value['id']?>"  >
            </td>
            <td >
                <input type="button" value="編輯次選單" 
                onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/submenu.php?id=<?=$value['id'];?>&#39;)" >
            </td>



            <input type="hidden" name="id[]" value="<?=$value['id'];?>">
            </tr>
             <?php
            }
             ?>

    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do;?>.php&#39;)" 
      
      value="<?= $adStr[$do];?>"></td>
      <td class="cent">
        <input type="submit" value="修改確定">
         <input type="reset" value="重置">
           <!-- 送出table值 -->
         <input type="hidden" name="table" value="<?=$do;?>">
      </td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>
                                                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                             </div>