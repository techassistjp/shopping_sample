<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理画面・商品一覧</title>
</head>
<body>
<h1>管理画面・商品一覧</h1>
<a href="add.php">商品追加</a>
<table border="1">
	<tr>
		<th>画像</th>
		<th>商品名</th>
		<th>価格</th>
		<th>修正</th>
		<th>削除</th>
	</tr>
<?php foreach($list as $row){ ?>
	<tr>
		<td><img src="/upload/items/<?php echo $row['photo'] ?>" width="200"></td>
		<td><?php echo $row['name'] ?></a>
		</td>
		<td><?php echo number_format($row['price']) ?>円</td>
		<td><a href="edit.php?id=<?php echo $row['id'] ?>">修正</a></td>
		<td><a href="delete.php?id=<?php echo $row['id'] ?>">削除</a></td>
	</tr>
<?php } ?>
</table>
</body>
</html>
