<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>注文情報入力</title>
</head>
<body>
<h1>注文情報入力</h1>
<form method="post" action="index.php">
	<input type="hidden" name="mode" value="confirm">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="hidden" name="name" value="<?php echo $name ?>">
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
				<p style="color:red"><?php echo @$error['cnt'] ?></p>
				<input type="text" name="cnt" value="<?php echo $cnt ?>" size="10">個
			</td>
		</tr>
		<tr>
			<th>氏名</th>
			<td>
				<p style="color:red"><?php echo @$error['shimei'] ?></p>
				<input type="text" name="shimei" value="<?php echo $shimei ?>" size="30">
			</td>
		</tr>
		<tr>
			<th>郵便番号</th>
			<td>
				<p style="color:red"><?php echo @$error['zip'] ?></p>
				<input type="text" name="zip" value="<?php echo $zip ?>" size="10">
			</td>
		</tr>
		<tr>
			<th>住所</th>
			<td>
				<p style="color:red"><?php echo @$error['address'] ?></p>
				<input type="text" name="address" value="<?php echo $address ?>" size="50">
			</td>
		</tr>
	</table>
	<input type="submit" value="確認">
</form>
</body>
</html>