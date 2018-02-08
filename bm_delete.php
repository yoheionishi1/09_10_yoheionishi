<?php
//1.GETでid,name,email,naiyouを取得
$id=$_GET["id"];

//2.DB接続など
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
    }

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
//データ登録SQL更新
 $sql = 'DELETE FROM gs_bm_table WHERE id=:id'; 
 $update=$pdo->prepare($sql);
 $update ->bindValue(':id',$id,PDO::PARAM_INT); 
 $status = $update->execute();

 if($status==false){
 $error=$update->errorInfo();
 exit("QueryError:".$error[2]);
 }else{
 header("Location:bm_select.php");
 exit;
 }


?>