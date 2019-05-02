<?php
/*
 * 商品詳細
 */
include("./lib/common.php");

//DB接続を行いPDOを取得
$pdo = get_conn();

//変数を初期化
$id = $_GET['id'];	//商品ID
$name = "";	//商品名
$description = "";	//商品説明
$price = "";	//価格
$photo = "";	//写真

//DBから商品情報を取得
$stmt = $pdo->prepare("select id,name,description,price,photo from items where id = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();

if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	//商品情報を変数に格納
	$name = $result['name'];
	$description = $result['description'];
	$price = $result['price'];
	$photo = $result['photo'];
}

//画面描画
include("./lib/view/detail.php");

?>
