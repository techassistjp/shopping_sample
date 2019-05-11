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
<h1 style="display:block;background:#ccc;font-weight:bold;width:500px;"><?php echo $name ?>｜商品詳細</h1>
<p><a href="/">商品一覧へ戻る</a>
<table style="border:1px solid #333;width:500px;">
	<tr>
		<th style="border:1px solid #333;width:200px;background:#eee;">写真</th>
		<td style="border:1px solid #333;width:300px;"><img src="/upload/items/<?php echo $photo ?>" width="300"></td>
	</tr>
	<tr>
		<th style="border:1px solid #333;width:200px;background:#eee;">商品名</th>
		<td style="border:1px solid #333;width:300px;"><?php echo $name ?></td>
	</tr>
	<tr>
		<th style="border:1px solid #333;width:200px;background:#eee;">商品説明</th>
		<td style="border:1px solid #333;width:300px;"><?php echo nl2br($description) ?></td>
	</tr>
	<tr>
		<th style="border:1px solid #333;width:200px;background:#eee;">価格</th>
		<td style="border:1px solid #333;width:300px;"><?php echo number_format($price) ?>円</td>
	</tr>
</table>
<div style="width:500px;text-align:center;">
	<input type="button" value="注文する" id="btn_order">
</div>
</body>
</html>