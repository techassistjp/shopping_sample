<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>商品一覧</title>
</head>
<body>
<h1 style="display:block;background:#ccc;font-weight:bold;width:500px;">商品一覧</h1>
<table style="border:1px solid #333;width:500px;">
	<tr style="background:#eee;">
		<th style="border:1px solid #333;width:200px;">画像</th>
		<th style="border:1px solid #333;">商品名</th>
		<th style="border:1px solid #333;">価格</th>
	</tr>
<?php foreach($list as $row){ ?>
	<tr>
		<td style="border:1px solid #333;"><img src="/upload/items/<?php echo $row['photo'] ?>" width="200"></td>
		<td style="border:1px solid #333;">
			<a href="detail.php?id=<?php echo $row['id'] ?>">
				<?php echo $row['name'] ?>
			</a>
		</td>
		<td style="border:1px solid #333;text-align:right;"><?php echo number_format($row['price']) ?>円</td>
	</tr>
<?php } ?>
</table>
</body>
</html>