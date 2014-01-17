  <?php
function redirect_to($filename) {
$host = $_SERVER['HTTP_HOST'];
$dir  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
header('HTTP/1.1 301 Moved Permanently');
header("Location:http://${host}${dir}/${filename}");
}
try{
$pdo = new PDO('mysql:host=localhost;dbname=webpro2examdb;charset=utf8;', 'root', '');
}    
catch (PDOException $e){
var_dump($e->getMessage());
}
function is_even($num)
{
$num = (int)$num;
return ($num & 1) ? false : true;
}
function SBC_DBC($str) { 
$DBC = array(０ , １ , ２ , ３ , ４ ,  ５ , ６ , ７ , ８ , ９);
$SBC = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
return str_replace($DBC,$SBC,$str);
}

$res = $pdo->prepare('select sales_at from sales ');
$res->execute();
$saleTime = $res->fetchAll();
foreach ($saleTime as $key=>$value){
  $i=0;
  foreach($value as $key=>$value){
    $i++;
    if(is_even($i)){$sales_at[]=$value;}
    }
  }

$res = $pdo->prepare('select quantity from sales ');
$res->execute();
$each = $res->fetchAll();
foreach ($each as $key=>$value){
  $i=0;
  foreach($value as  $key=>$value){
    $i++;
    if(is_even($i)){$quantity[]=$value;}
    }
  }

$res = $pdo->prepare('select product_id from sales ');
$res->execute();
$proId = $res->fetchAll();
foreach ($proId as $key=>$value){
  $i=0;
  foreach($value as  $key=>$value){
    $i++;
    if(is_even($i)){
      $product_id[]=$value;
    }
    }
  }

foreach($product_id as $key=>$value){
$res = $pdo->prepare("select * from products where ID=$value");
$res->execute();
$proData= $res->fetchAll();

foreach($proData as $key=>$value){
  foreach($value as $key=>$value){
     if($key=="name"){$Name[]=$value;}
     if($key=="price"){$Price[]=$value;}
      }
   }
}
$i=0;
foreach ($Price as $key=>$value){
    $i++;
  if(is_even($i)){
      $proPrice[]=$value;
    }

  }

$i=0;
foreach ($Name as $key=>$value){
    $i++;
  if(is_even($i)){
      $proName[]=$value;
    }

  }

$len=count($proPrice);
for ($i=0;$i<$len;$i++){    $AllPrice[]=$proPrice[$i]*$quantity[$i];  }


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
            <li><a href="index.php">商品一覧</a></li>
            <li class="active"><a href="sales.php">売上一覧</a></li>
          </ul>
        </div><!--/.nav-collapse -->
</div>
</div>
<div class="container">
<h1>売上一覧</h1>
<p>これまでに購入された商品の一覧です。</p>     
<table class="table table-bordred">
<thead>
<tr>
<th>日時</th>
 <th>商品名</th>
<th>個数</th>
<th>合計（個数 * 単価）</th>
</tr>
</thead>
<tbody>
<?php

for ($i=0;$i<$len;$i++){  
echo "<tr>";  
echo"<th>". $sales_at[$i]."</th>";
echo"<th>". $proName[$i]."</th>";
echo"<th>". $quantity[$i]."</th>";
echo"<th>". $AllPrice[$i]."</th>";
echo "</tr>"; 
}
?>
</tbody>
</table>
</div><!-- /.container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>