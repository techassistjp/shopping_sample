<?php
/**
 * DB接続を行いPDOを取得する
 * @return PDO pdoを返す
 */
function get_conn(){
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=shopping_sample;port=3306;charset=utf8;","root","");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		return $pdo;
	}catch(PDOException $e){
		echo $e->getMessage();
		exit;
	}
}

/**
 * 処理モードを取得する
 * @return string|NULL 処理モードを返す
 */
function get_mode(){
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		return isset($_GET['mode']) ? $_GET['mode'] : "";
	}else if($_SERVER["REQUEST_METHOD"] == "POST"){
		return isset($_POST['mode']) ? $_POST['mode'] : "";
	}else{
		return null;
	}
}

/**
 * メールを送信する
 * @param string $to 宛先
 * @param string $from 差出人
 * @param string $subject タイトル
 * @param string $body 本文
 * @param string $return_path メール未達の場合の通知先
 * @return boolean 送信結果を返す
 */
function send_mail($to,$from,$subject,$body,$return_path){
	$header = "From: " . $from . "\n";
	mb_language("uni");
	mb_internal_encoding("utf-8");
	$param = "-f " . $return_path;
	return mb_send_mail($to,$subject,$body,$header,$param);
}

/**
 * リダイレクトを行う
 * @param string $path リダイレクト先のパス
 */
function redirect($path){
	header("Location: " . $path);
}
?>