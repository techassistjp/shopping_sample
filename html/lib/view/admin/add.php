<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理画面・商品追加</title>
</head>
<body>
<h1>管理画面・商品追加</h1>
<form method="post" action="add.php" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="add">
	<table border="1">
		<tr>
			<th>商品名</th>
			<td>
				<p style="color:red"><?php echo @$error['name'] ?></p>
				<input type="text" name="name" value="<?php echo $name ?>" size="50">
			</td>
		</tr>
		<tr>
			<th>商品説明</th>
			<td>
				<p style="color:red"><?php echo @$error['description'] ?></p>
				<textarea name="description" cols="50" rows="10"><?php echo $description ?></textarea>
			</td>
		</tr>
		<tr>
			<th>価格</th>
			<td>
				<p style="color:red"><?php echo @$error['price'] ?></p>
				<input type="text" name="price" value="<?php echo $price ?>" size="10">円
			</td>
		</tr>
		<tr>
			<th>写真</th>
			<td>
				<p style="color:red"><?php echo @$error['photo'] ?></p>
				<input type="file" name="photo">
			</td>
		</tr>
	</table>
	<input type="submit" value="追加">
</form>
</body>
</html>