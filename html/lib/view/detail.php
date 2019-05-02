<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $name ?>｜商品詳細</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(function(){
    $("#btn_order").click(function(){
        location.href = "/order/?id=<?php echo $id ?>&name=<?php echo urlencode($name) ?>";
    });
});
</script>
</head>
<body>
<h1><?php echo $name ?>｜商品詳細</h1>
<p><a href="/">商品一覧へ戻る</a>
<table border="1">
	<tr>
		<th>写真</th>
		<td><img src="/upload/items/<?php echo $photo ?>" width="300"></td>
	</tr>
	<tr>
		<th>商品名</th>
		<td><?php echo $name ?></td>
	</tr>
	<tr>
		<th>商品説明</th>
		<td><?php echo nl2br($description) ?></td>
	</tr>
	<tr>
		<th>価格</th>
		<td><?php echo number_format($price) ?>円</td>
	</tr>
	<tr>
		<th></th>
		<td><input type="button" value="注文する" id="btn_order"></td>
	</tr>
</table>
</body>
</html>