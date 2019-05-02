<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理画面・商品修正</title>
</head>
<body>
<h1>管理画面・商品修正</h1>
<form method="post" action="edit.php" enctype="multipart/form-data">
	<input type="hidden" name="mode" value="edit">
	<input type="hidden" name="id" value="<?php echo $id ?>">
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
				<img src="/upload/items/<?php echo $photo ?>" width="200">
				<input type="hidden" name="photo" value="<?php echo $photo ?>">
				<input type="file" name="photo">
			</td>
		</tr>
	</table>
	<input type="submit" value="修正">
</form>
</body>
</html>