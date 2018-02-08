<?php
//0.外部ファイル読み込み
session_start();
include("bm_functions.php");
chkSsid();

//1.POSTでid,name,email,naiyouを取得
$id = $_POST["id"];
$name=$_POST["bookname"];
$url=$_POST["bookurl"];
$comment=$_POST["bookcomment"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
//データ登録SQL更新
 $sql = "UPDATE gs_bm_table SET bookname=:bookname, bookurl=:bookurl, bookcomment=:bookcomment WHERE id=:id"; 
 $update=$pdo->prepare($sql);
 $update ->bindValue(':bookname', $name, PDO::PARAM_STR);  
 $update ->bindValue(':bookurl', $url , PDO::PARAM_STR);  
 $update ->bindValue(':bookcomment', $comment , PDO::PARAM_STR);  
 $update ->bindValue(':id', $id , PDO::PARAM_INT); 
 $status = $update->execute();

 if($status==false){
     $error=$stmt->errorInfo();
     exit("QueryError:".$error[2]);
 }else{
     header("Location:bm_select.php");
     exit;
 }



?>