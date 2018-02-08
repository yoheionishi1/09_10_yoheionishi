<?php

//DB接続関数
function db_con(){
$dbname='gs_db';
try {
$pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
exit('DbConnectError:'.$e->getMessage());
}
return $pdo;
}

//SQL処理エラー
function queryError($stmt){
//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
$error = $stmt->errorInfo();
exit("QueryError:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/

function h($str){
return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function chkSsid(){
    
if(!isset($_SESSION["chk_ssid"]) ||
      $_SESSION["chk_ssid"] != session_id()
      ){
      exit('ログインしていません<br><a href="bm_login.php">ログイン画面に戻りましょう</a>'); }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"] = session_id();
      }
      }






?>