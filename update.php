<?php session_start(); ?>

<?php
include("config.php");

if($_SESSION['username'] != null)
{

        $id = $_SESSION['username'];

        $sql = "SELECT * FROM membership where member_acc='$id'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
    
        echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
        echo "帳號：<input type=\"text\" name=\"id\" value=\"$row[1]\" />(此項目無法修改) <br>";
        echo "密碼：<input type=\"password\" name=\"pw\" value=\"$row[2]\" /> <br>";
        echo "再一次輸入密碼：<input type=\"password\" name=\"pw2\" value=\"$row[2]\" /> <br>";
        echo "姓名：<input type=\"text\" name=\"telephone\" value=\"$row[3]\" /> <br>";
        echo "地址：<input type=\"text\" name=\"address\" value=\"$row[4]\" /> <br>";
        echo "電話：<textarea name=\"other\" cols=\"45\" rows=\"5\">$row[5]</textarea> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
;?>