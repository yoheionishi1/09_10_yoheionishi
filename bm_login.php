<!-- Head[Start] -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="boostrap.css">
<link rel="stylesheet" type="text/css" href="example.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>ブックマークアプリ</title>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_detail.php">書籍一覧</a>
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
<li><a href="bm_select.php">書籍一覧</a></li>
<li><a href="bm_insert_view.php">書籍新規登録</a></li>
<li class="active"><a href="bm_login.php">ログイン</a></li>
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
<form method="post" action="bm_login_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ログイン</legend>
     <label>ユーザーID：<input type="text" name="lid"></label><br>
     <label>ユーザーPW：<input type="password" name="lpw"></label><br>
     <input type="submit" value="LOGIN">
    </fieldset>
  </div>
</form>
</div>
</div>
<!-- Main[End] -->

</body>
</html>