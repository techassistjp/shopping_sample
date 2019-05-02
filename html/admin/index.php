<?php
/*
 * 管理画面・商品一覧
 */
include("../lib/common.php");

//DB接続を行いPDOを取得
$pdo = get_conn();

//商品情報を格納する配列を初期化
$list = array();

//DBから商品情報を取得
$stmt = $pdo->query("select id,name,description,price,photo from items order by created desc");
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
	//商品情報を配列に格納
	$list[] = $result;
}

//画面描画
include("../lib/view/admin/index.php");
?>
