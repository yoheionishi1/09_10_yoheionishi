<?php



//入力チェック(受信確認処理追加)
if(
!isset($_POST["bookname"]) || $_POST["bookname"]=="" ||
!isset($_POST["bookurl"]) || $_POST["bookurl"]=="" ||
!isset($_POST["bookcomment"]) || $_POST["bookcomment"]==""
){
exit('エラーです。もう一度入力しなおしてください');
}

//1. POSTデータ取得//nameが大事
$name   = $_POST["bookname"];
$url =$_POST["bookurl"];
$comment=$_POST["bookcomment"];

//2. DB接続します(エラー処理追加)
try{
$pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch(PDOException $e){
exit('DbConnectError:' .$e->getMessage());
}


//３．データ登録SQL作成→実行
//PARAM_STRは文字列、PARAM_intは数字
$sql="INSERT INTO gs_bm_table(id, bookname, bookurl, bookcomment,
indate )VALUES(NULL, :a1, :a2, :a3, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name,PDO::PARAM_STR);
$stmt->bindValue(':a2', $url,PDO::PARAM_STR);
$stmt->bindValue(':a3', $comment,PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
$error = $stmt->errorInfo();
exit("QueryError:".$error[2]);
}
else{
//５．index.phpへリダイレクト
//半角スペース
header("Location: bm_insert_view.php");
exit;
}
?>