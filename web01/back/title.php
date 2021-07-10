<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                                            <!--標題變數  -->
                                    <p class="t cent botli"><?=$ts[$do];?></p>
        <form method="post" action="./api/edit.php">
    <table width="100%">
    	<tbody><tr class="yel">
        	<td width="45%">網站標題</td>
            <td width="23%">替代文字</td>
            <td width="7%">顯示</td>
            <td width="7%">刪除</td><td></td>
            </tr>

            <?php 
            $rows = $Title->all();
            foreach ($rows as $key=>$value) {
                ?>
                <?php 
                // echo "<pre>";
                // print_r($value); 
                //用dd看一下$value的陣列
                ?>

            <tr >
        	<td width="45%">
                <!-- 記得要確認src的路徑位置  -->
                <img src="./img2/<?=$value['img'];?>" style="width:300px;height:30px;" alt="">
            </td>
            <td width="23%">
                <!-- text[] 我們要儲存多筆資料 所以用陣列儲存 -->
                <input type="text" name="text[]" value="<?=$value['text']?>">
            </td>
            <td width="7%">
                <input type="radio" name="sh" value="<?=$value['id']?>">
            </td>
            <td width="7%">
                <!-- 因為checkbox是多選所以是陣列形式 -->
                <input type="checkbox" name="del[]" id="<?=$value['id']?>">
            </td>
            <td>
                <input type="button" value="更新圖片">
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
      
      value="<?= $adStr[$do];?>"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>
                                                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                             </div>