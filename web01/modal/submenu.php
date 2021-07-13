<?php
/*記得引入 base 檔，因為用Ajax方式傳遞沒辦法繼承，同樣也沒辦法透過url抓取變數，
所以我們直接用輸入文字的方式解決*/
include_once "../base.php";
?>

<h3 class="cent">編輯次選單</h3>
<hr>
<form action="api/submenu.php" method="post" enctype="multipart/form-data">
    <table style="margin: 0 auto; text-align:center;" id="sub">
        <tr>
            <td >次選單名稱</td>
            <td >次選單連結網址</td>
            <td >刪除</td>
        </tr>
        <tr>
            <td><input type="text" name="text[]"></td>
           <td><input type="text" name="href[]"></td>
           <td></td>
        </tr>
    </table>
    <div class="cent">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
         <!-- 送出table值 -->
     <input type="hidden" name="table" value="menu">
    </div>
</form>

<script>
    function more(){
        let str = ` <tr>
                     <td><input type="text" name="text2[]"></td>
                     <td><input type="text" name="href2[]"></td>
                    </tr>`;
        
        //選取$sub的dom 在尾標籤前append str 
        $("#sub").append(str);
    }

</script>