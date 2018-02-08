<?php


//0.外部ファイル接続
//共通で使用するものは別ファイルで管理
include("bm_functions.php");

//1. DB接続します
$pdo=db_con();

//２．データ登録SQL作成
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR);
$res = $stmt->execute();

//３．データ表示
if($res==false){
queryError($stmt);
}

$val = $stmt->fetch();//1レコードのみ取得する方法

//4該当レコードをsessionに値を代入
if( $val["id"] !=""){
    $_SESSION["chk_ssid"]=session_id();//キー発行
    $_SESSION["kanri_flg"]=$val['kanri_flg'];
    $_SESSION["name"]      = $val['name'];
    header("Location:bm_select.php");
}else{
    header("Location:bm_login.php");
}

exit();
?>

