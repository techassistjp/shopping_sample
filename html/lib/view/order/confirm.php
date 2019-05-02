<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>注文情報入力確認</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(function(){
    $("#btn_previous").click(function(){
		$("#mode").val("previous");
        $("#form1").submit();
    });
    $("#btn_order").click(function(){
		$("#mode").val("order");
        $("#form1").submit();
    });
});
</script>
</head>
<body>
<h1>注文情報入力確認</h1>
<form method="post" action="confirm.php" id="form1">
	<input type="hidden" id="mode" name="mode" value="order">
	<table border="1">
		<tr>
			<th>商品名</th>
			<td>
				<?php echo $name ?>
			</td>
		</tr>
		<tr>
			<th>数量</th>
			<td>
				<?php echo $cnt ?>個
			</td>
		</tr>
		<tr>
			<th>氏名</th>
			<td>
				<?php echo $shimei ?>
			</td>
		</tr>
		<tr>
			<th>郵便番号</th>
			<td>
				<?php echo $zip ?>
			</td>
		</tr>
		<tr>
			<th>住所</th>
			<td>
				<?php echo $address ?>
			</td>
		</tr>
	</table>
	<input type="button" value="戻る" id="btn_previous">
	<input type="button" value="注文" id="btn_order">
</form>
</body>
</html>