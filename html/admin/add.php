<?php
/*
 * 管理画面・商品追加
 */
include("../lib/common.php");
$mode = get_mode();	//処理モードを取得
$pdo = get_conn();	//DB接続を行いPDOを取得

//追加ボタン押下時
if($mode == "add"){
	//前画面から送信された値を変数にセット
	$name = isset($_POST['name']) ? $_POST['name'] : "";	//商品名
	$description = isset($_POST['description']) ? $_POST['description'] : "";		//商品説明
	$price = isset($_POST['price']) ? $_POST['price'] : "";	//価格
	$photo_tmp_path = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : "";	//アップロードした写真の一時保存先
	$photo_file_name = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";	//アップロードした写真のファイル名

	//入力チェック
	$error = array();

	if(!$name){
		$error["name"] = "商品名を入力してください";
	}else if(mb_strlen($name) > 50){
		$error["name"] = "商品名は50文字以内で入力してください";
	}

	if(!$price){
		$error["price"] = "価格を入力してください";
	}else if(!is_numeric($price) || $price < 0 || $price > 99999999){
		$error["price"] = "価格は0～99999999の数値で入力してください";
	}

	if(!$photo_tmp_path){
		$error["photo"] = "写真を選択してください";
	}

	if(count($error) > 0){
		//エラーがある場合
		//入力画面に戻ってエラーメッセージを表示
		include("../lib/view/admin/add.php");
	}else{
		//エラーが無い場合
		//DB登録
		$stmt = $pdo->prepare("insert into items (created,name,description,price,photo) values (now(), :name, :description, :price, :photo)");
		$stmt->bindParam(':name',$name);
		$stmt->bindParam(':description',$description);
		$stmt->bindParam(':price',$price);
		$stmt->bindParam(':photo',$photo_file_name);
		$stmt->execute();

		//写真をアップロードフォルダへ移動
		$upload_path = "../upload/items/" . $photo_file_name;
		move_uploaded_file($photo_tmp_path,$upload_path);

		//商品一覧画面へ遷移する
		redirect("./");
	}

//初期表示時
}else{
	//変数を初期化
	$name = "";	//商品名
	$description = "";	//商品説明
	$price = "";	//価格

	//画面描画
	include("../lib/view/admin/add.php");
}

?>
