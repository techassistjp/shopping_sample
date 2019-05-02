<?php
/*
 * 注文情報入力
 */
include("../lib/common.php");
$mode = get_mode();	//処理モードを取得
session_start();	//セッションを有効にする

//確認ボタン押下時
if($mode == "confirm"){
	//注文情報入力画面から送信された値を変数にセット
	$order = array();
	$order['id'] = $id = isset($_POST['id']) ? $_POST['id'] : ""; //商品ID
	$order['name'] = $name = isset($_POST['name']) ? $_POST['name'] : "";	//商品名
	$order['cnt'] = $cnt = isset($_POST['cnt']) ? $_POST['cnt'] : "";	//数量
	$order['shimei'] = $shimei = isset($_POST['shimei']) ? $_POST['shimei'] : "";	//氏名
	$order['zip'] = $zip = isset($_POST['zip']) ? $_POST['zip'] : "";	//郵便番号
	$order['address'] = $address = isset($_POST['address']) ? $_POST['address'] : "";	//住所

	//入力チェック
	$error = array();

	if(!$cnt){
		$error["cnt"] = "数量を入力してください";
	}else if(!is_numeric($cnt) || $cnt < 0 || $cnt > 999){
		$error["cnt"] = "数量は1～999の数値で入力してください";
	}

	if(!$shimei){
		$error["shimei"] = "氏名を入力してください";
	}

	if(!$zip){
		$error["zip"] = "郵便番号を入力してください";
	}

	if(!$address){
		$error["address"] = "住所を入力してください";
	}

	if($error){
		//エラーがある場合
		//入力画面に戻ってエラーメッセージを表示
		include("../lib/view/order/index.php");
	}else{
		//エラーが無い場合
		//セッションに保持
		$_SESSION['order'] = $order;

		//確認画面に遷移
		redirect("./confirm.php");
	}

//初期表示時
}else{
	$id = isset($_GET['id']) ? $_GET['id'] : ""; //商品ID
	$name = isset($_GET['name']) ? $_GET['name'] : "";	//商品名
	$cnt = "";	//数量
	$shimei = "";	//氏名
	$zip = "";	//郵便番号
	$address = "";	//住所

	//画面描画
	include("../lib/view/order/index.php");
}

?>
