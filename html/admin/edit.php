<?php
/*
 * 管理画面・商品編集
 */
include("../lib/common.php");
$mode = get_mode();	//処理モードを取得
$pdo = get_conn();	//DB接続を行いPDOを取得

//更新ボタン押下時
if($mode == "edit"){
	//前画面から送信された値を変数にセット
	$id = isset($_POST['id']) ? $_POST['id'] : "";	//商品ID
	$name = isset($_POST['name']) ? $_POST['name'] : "";	//商品名
	$description = isset($_POST['description']) ? $_POST['description'] : "";		//商品説明
	$price = isset($_POST['price']) ? $_POST['price'] : "";	//価格
	$photo_tmp_path = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : "";	//アップロードした写真の一時保存先
	$photo_file_name = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : "";	//アップロードした写真のファイル名
	$photo = isset($_POST['photo']) ? $_POST['photo'] : "";	//登録済みの写真

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

	//入力チェックのエラーの有無で処理を振り分ける
	if(count($error) > 0){
		//エラーがある場合
		//入力画面に戻ってエラーメッセージを表示
		include("../lib/view/admin/edit.php");
	}else{
		//エラーが無い場合
		//DB登録
		$stmt = $pdo->prepare("update items set modified = now(), name = :name, description = :description, price = :price, photo = :photo where id = :id");
		$stmt->bindParam(':name',$name);
		$stmt->bindParam(':description',$description);
		$stmt->bindParam(':price',$price);
		if($photo_file_name){
			$photo = $photo_file_name;
		}
		$stmt->bindParam(':photo',$photo);
		$stmt->bindParam(':id',$id);
		$stmt->execute();

		//写真をアップロードフォルダへ移動
		if($photo_file_name){
			$upload_path = "../upload/items/" . $photo_file_name;
			move_uploaded_file($photo_tmp_path,$upload_path);
		}

		//商品一覧画面へ遷移する
		redirect("./");
	}

//初期表示時
}else{
	//変数を初期化
	$id = $_GET['id'];	//商品ID
	$name = "";	//商品名
	$description = "";	//商品説明
	$price = "";	//価格
	$photo = "";	//写真

	//DBから商品IDをキーとして商品情報を取得
	$stmt = $pdo->prepare("select id,name,description,price,photo from items where id = :id");
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		//DBから取得した商品情報を変数にセット
		$name = $result['name'];
		$description = $result['description'];
		$price = $result['price'];
		$photo = $result['photo'];
	}

	//画面描画
	include("../lib/view/admin/edit.php");
}

?>
