<?php
/*
 * 注文情報入力確認
 */
include("../lib/common.php");

$mode = get_mode();
session_start();

//注文ボタン押下時
if($mode == "order"){
	//セッションから注文情報を取得し変数にセット
	$order = $_SESSION['order'];
	$name = $order['name'];
	$cnt = $order['cnt'];
	$shimei = $order['shimei'];
	$zip = $order['zip'];
	$address = $order['address'];

	//メール送信（ショップ宛て）
	$to = "info@t.com";
	$from = "noreply@t.com";
	$return_path = "info@t.com";
	$subject = "注文がありました";
	$body = <<<BODY
商品名：$name
数量：$cnt 個

氏名：$shimei
郵便番号：$zip
住所：$address

BODY;
	send_mail($to,$from,$subject,$body,$return_path);

	redirect("./finish.php");

//戻るボタン押下時
}else if($mode == "previous"){
	//セッションから注文情報を取得し変数にセット
	$order = $_SESSION['order'];
	$name = $order['name'];
	$cnt = $order['cnt'];
	$shimei = $order['shimei'];
	$zip = $order['zip'];
	$address = $order['address'];

	//画面描画
	include("../lib/view/order/index.php");

//初期表示時
}else{
	//セッションから注文情報を取得し変数にセット
	$order = $_SESSION['order'];
	$name = $order['name'];
	$cnt = $order['cnt'];
	$shimei = $order['shimei'];
	$zip = $order['zip'];
	$address = $order['address'];

	//画面描画
	include("../lib/view/order/confirm.php");
}

?>
