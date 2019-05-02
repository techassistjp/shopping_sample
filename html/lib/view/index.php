<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>商品一覧</title>
</head>
<body>
<h1>商品一覧</h1>
<table border="1">
	<tr>
		<th>画像</th>
		<th>商品名</th>
		<th>価格</th>
	</tr>
<?php foreach($list as $row){ ?>
	<tr>
		<td><img src="/upload/items/<?php echo $row['photo'] ?>" width="200"></td>
		<td>
			<a href="detail.php?id=<?php echo $row['id'] ?>">
				<?php echo $row['name'] ?>
			</a>
		</td>
		<td><?php echo number_format($row['price']) ?>円</td>
	</tr>
<?php } ?>
</table>
</body>
</html>