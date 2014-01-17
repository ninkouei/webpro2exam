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
return str_replace($DBC,$SBC,$str);  //全角到半角
}
$res = $pdo->prepare('select count(*) from sales');
$res->execute();
$result = $res->fetchAll();

foreach ($result as $key1=>$value1){
foreach ($value1 as $key=>$value){
if($key=="count(*)"){
$id=$value;
$id++;
}
}
}
$product_id = $_GET['id'];
$time = time() + 9*3600;
$sales_at=gmdate("Y/m/d H:i:s ", $time);
$quantity=$_POST["each"];
if(!is_integer($quantity)){$quantity=SBC_DBC($quantity);}
if($quantity==null && $quantity==0){redirect_to('../sales.php');}
else {
$salesdata = $pdo -> prepare("INSERT INTO sales (ID,product_id,sales_at,quantity) VALUES (:ID,:product_id,:sales_at,:quantity)");
$salesdata->bindParam(':ID', 		    $id,     		PDO::PARAM_STR);
$salesdata->bindParam(':product_id',	$product_id,	PDO::PARAM_STR);
$salesdata->bindParam(':sales_at',		$sales_at, 		PDO::PARAM_STR);
$salesdata->bindParam(':quantity',		$quantity,		PDO::PARAM_STR);
$salesdata->execute();
$salesdata=null;
redirect_to('../sales.php');
}
?>