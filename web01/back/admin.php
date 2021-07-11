<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                            <!--標題變數  -->
        <p class="t cent botli"><?=$ts[$do];?></p>
        <!-- 原本這裡會有一行target 記得刪掉不然不能成功運作 -->
<form method="post" action="./api/edit.php">
    <table width="100%" class="cent">
    	<tbody>
            <tr class="yel">
               <td width="45%">帳號</td>
               <td width="10%">密碼</td>
               <td width="10%">刪除</td>
            </tr>
            <?php 
            $rows = $Admin->all();
            foreach ($rows as $key=>$value) {
                ?>
            <tr >
            <td >
                <!--acc[]我們要儲存多筆資料 所以用陣列儲存 -->
                <input type="text" name="acc[]" value="<?=$value['acc']?>" style="width:90%;">
            </td>
            <td >
                <input type="text" name="pw[]" value="<?=$value['pw']?>" style="width:90%;">
            </td>
            <td >
                <!-- 因為checkbox是多選所以是陣列形式 --> 
                <input type="checkbox" name="del[]" value="<?=$value['id']?>"  >
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