<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
         <p class="t cent botli"><?=$hStr['bottom']?></p>
         <!-- post 導向 api/edit_total.php 注意寫法api前不用再加/-->
    <form method="post"  action="api/edit_bottom.php">
    <table width="50%" style="margin:auto">
    	<tbody><tr class="yel">
                            <!--標題變數  -->
        	<td width="50%"><?=$hStr[$do];?></td>
                           <!-- input 輸入欄位 注意name和value寫正確-->
            <td width="50%"><input type="text" name="bottom" value="<?= $Bottom->find(1)['bottom']; ?>"></td>
                </tr>
    </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><td class="cent">
      <input type="submit" value="修改確定">
      <input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>
                                                </div>
              
                             </div>