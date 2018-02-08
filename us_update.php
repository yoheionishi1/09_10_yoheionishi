<?php
//1.POSTで以下の内容を取得
$id = $_POST["id"];
$usname=$_POST["name"];
$usid=$_POST["lid"];
$uspw=$_POST["lpw"];
$kanri=$_POST["kanri_flg"];
$life=$_POST["life_flg"];

//2.DB接続など
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
    }

//3.UPDATE gs_user_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れです。
//データ登録SQL更新
 $sql = "UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE id=:id"; 
 $update=$pdo->prepare($sql);
 $update ->bindValue(':name', $usname, PDO::PARAM_STR);  
 $update ->bindValue(':lid', $usid , PDO::PARAM_STR);  
 $update ->bindValue(':lpw', $uspw , PDO::PARAM_STR);
 $update ->bindValue(':kanri_flg', $kanri , PDO::PARAM_INT);
 $update ->bindValue(':life_flg', $life , PDO::PARAM_INT); 
 $update ->bindValue(':id', $id , PDO::PARAM_INT);
 $status = $update->execute();

 if($status==false){
     $error=$stmt->errorInfo();
     exit("QueryError:".$error[2]);
 }else{
     header("Location:us_select.php");
     exit;
 }

?>