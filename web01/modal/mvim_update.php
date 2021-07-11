<?php
/*記得引入 base 檔，因為用Ajax方式傳遞沒辦法繼承，同樣也沒辦法透過url抓取變數，
所以我們直接用輸入文字的方式解決*/
include_once "../base.php";
?>

<h3 class="cent">更換動畫圖片</h3>
<hr>
<!-- 因為要上傳檔案，要傳比較大的檔案，資料量大的建議使用post -->
<!-- 另外絕對要記得加上 enctype 才能上傳檔案 multipart/form-data(多媒體資料格式/以表單方式傳送)-->
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin: 0 auto;">
    <tr>
        <td><?= $hStr['mvim'];?>:</td>
        <td><input type="file" name="img" ></td>
    </tr>
</table>
<div class="cent">
    <input type="submit" value="新增" >
    <input type="reset" value="重置">
      <!-- 送出table值 -->
      <input type="hidden" name="table" value="mvim">
</div>
</form>