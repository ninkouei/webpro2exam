<?php
$id = $_GET['id']+1;
try {
$pdo = new PDO('mysql:host=localhost;dbname=webpro2examdb;charset=utf8;', 'root', '');
}    
catch (PDOException $e) {
var_dump($e->getMessage());
}
$sth = $pdo->prepare("select * from products where id=$id");
$sth->execute();
$result = $sth->fetchAll();
foreach($result as $key=>$array){
$proID=$array["ID"];
$proName=$array["name"];
$proPrice=$array["price"];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">商品一覧</a></li>
            <li><a href="sales.php">売上一覧</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
        <div class="container">

      <h1>商品詳細</h1>

      <p>購入数を入力して、購入ボタンを押してください。</p>
 <form name="form2" method="post" class="form-horizontal" role="form" action="./controllers/ProductsController.php<?php echo "?id=$id ";?>">
 <fieldset>
          <div class="form-group">
            <label class="col-sm-2 control-label">商品名</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $proName;?></p>
            </div>
          </div>


         <div class="form-group">
            <label class="col-sm-2 control-label">価格</label>
            <div class="col-sm-10">
              <p class="form-control-static"><?php echo $proPrice;?></p>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">購入数</label>
            <div class="col-sm-1">
              <input type="text" name="each" class="form-control" />
            </div>
          </div>


</fieldset>
<div class="well">
<a href="index.php" class="btn btn-default">戻る</a>
&nbsp;
<button type="submit" class="btn btn-primary">購入する</button>
</div>
</form>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>