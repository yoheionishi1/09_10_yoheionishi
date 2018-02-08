<?php
//入力チェック(受信確認処理追加)
if(
!isset($_POST["name"]) || $_POST["name"]=="" ||
!isset($_POST["lid"]) || $_POST["lid"]=="" ||
!isset($_POST["lpw"]) || $_POST["lpw"]=="" ||
!isset($_POST["kanri_flg"]) || $_POST["kanri_flg"]=="" ||
!isset($_POST["life_flg"]) || $_POST["life_flg"]==""
){
exit('ParamError');
}

//1. POSTデータ取得//nameが大事
$name = $_POST["name"];
$id =$_POST["lid"];
$pw=$_POST["lpw"];
$kanri=$_POST["kanri_flg"];
$life=$_POST["life_flg"];


//2. DB接続します(エラー処理追加)
try{
$pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch(PDOException $e){
exit('DbConnectError:' .$e->getMessage());
}


//３．データ登録SQL作成→実行
//PARAM_STRは文字列、PARAM_intは数字
$sql="INSERT INTO gs_user_table(id, name, lid, lpw,
kanri_flg,life_flg )VALUES(NULL, :a1, :a2, :a3, :a4, :a5)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name,PDO::PARAM_STR);
$stmt->bindValue(':a2', $id,PDO::PARAM_STR);
$stmt->bindValue(':a3', $pw,PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri,PDO::PARAM_INT);
$stmt->bindValue(':a5', $life,PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
$error = $stmt->errorInfo();
exit("QueryError:".$error[2]);
}else{
//５．登録画面へリダイレクト
//半角スペース
header("Location: us_insert_view.php");
exit;
}
?>