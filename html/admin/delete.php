<?php
/*
 * 管理画面・商品削除
 */
include("../lib/common.php");

//DB接続を行いPDOを取得
$pdo = get_conn();

//商品一覧から送信された商品IDを変数にセット
$id = $_GET['id'];

//DBから商品IDに一致する商品情報を削除
$stmt = $pdo->prepare("delete from items where id = :id");
$stmt->bindParam(':id',$id);
$stmt->execute();

//一覧画面へ遷移
redirect("./");

?>
