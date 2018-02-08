<?php
//0.外部ファイル読み込み
include("bm_functions.php");

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示

$view="";
if($status==false){
//execute（SQL実行時にエラーがある場合）
$error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);
}else{
//Selectデータの数だけ自動でループしてくれる
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
$view.="<p>";
$view.='<a href="bm_detail.php?id='.$result["id"].'">';//アンカータグはシングルクオートで
$view.=$result["indate"].":".$result["bookname"];
$view.='</a>';
$view.='　';
$view.='<a href="bm_delete.php?id='.$result["id"].'">';
$view.='["削除"]';
$view.='</a>';
$view.="</p>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="boostrap.css">
<link rel="stylesheet" type="text/css" href="example.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>ブックマークアプリ+USER管理画面</title>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_detail.php"></a>
      <a class="navbar-brand" href="us/us_select.php">ユーザー一覧</a>
    </div>
  </nav>
</header>

<header>
<div class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<a href="#" class="navbar-brand">ブックマーク＋USER管理</a>
</div>
<div class="navbar-collapse collapse" id="navbar-main">
<ul class="nav navbar-nav">
<li class="active"><a href="bm_select.php">書籍一覧</a></li>
<li><a href="bm_insert_view.php">書籍新規登録</a></li>
<li><a href="us_select.php">ユーザー一覧</a></li>
<li><a href="us_insert_view.php">ユーザー登録</a></li>
<li><a href="bm_login.php">ログイン</a></li>
<li><a href="bm_logout.php">ログアウト</a></li>
</ul>

<div class="nav navbar-form navbar-right">
<div class="form-group">
<a href="https://twitter.com/" class="btn btn-twitter"><i class="fa fa-twitter fa-lg"></i> Tweet</a>
<a href="http://www.facebook.com/" class="btn btn-facebook"><i class="fa fa-facebook fa-lg"></i> Share</a>
<a href="javascript:window.open('http://b.hatena.ne.jp/" class="btn btn-hatebu"><i class="fa fa-hatebu fa-lg"></i> Bookmark</a>
</div>
</div>
</div>
</div>
</div>
</header>
<!-- Head[End] -->



<!-- Main[Start] -->
<div>
<div class="container jumbotron">
<form method="post" action="us_insert.php">
<div class="jumbotron">
<fieldset>
<legend>書籍一覧</legend>
<div class="container jumbotron"><?=$view?></div>
</fieldset>
</form>
</div>
</div>
<!-- Main[End] -->

</body>
</html>
