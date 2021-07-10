<?php
/*記得引入 base 檔，因為用Ajax方式傳遞沒辦法繼承，同樣也沒辦法透過url抓取變數，
所以我們直接用輸入文字的方式解決*/
include_once "../base.php";
?>

<h3 class="cent"><?= $adStr['admin'];?></h3>
<hr>
<!-- 因為要上傳檔案，要傳比較大的檔案，資料量大的建議使用post -->
<!-- 另外絕對要記得加上 enctype 才能上傳檔案 multipart/form-data(多媒體資料格式/以表單方式傳送)-->
<form action="../api/add.php" method="post" enctype="multipart/form-data">
<table style="margin: 0 auto;">
    <tr>
        <td style="text-align:right;">帳號:</td>
        <td><input type="text" name="acc" ></td>
    </tr>
    <tr>
        <td style="text-align:right;">密碼:</td>
        <td><input type="password" name="pw" ></td>
    </tr>
    <tr>
        <td style="text-align:right;" >確認密碼:</td>
        <td><input type="password" name="pw2" ></td>
    </tr>
</table>
<div class="cent">
    <input type="submit" value="新增" >
    <input type="reset" value="重置">
</div>
</form>