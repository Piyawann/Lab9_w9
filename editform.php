<?php
	$pdo = new PDO("mysql:host=localhost;dbname=blueshop; charset=utf8", "root", "");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
	$stmt->bindParam(1, $_GET["username"]);
	$stmt->execute();
	$row = $stmt->fetch();
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="edit-user.php" method="post">
        username : <input type="text" name="username" value="<?=$row["username"]?>"><br>
        password : <input type="text" name="password" value="<?=$row["password"]?>"><br>
        ชื่อ : <input type="text" name="name" value="<?=$row["name"]?>"><br>
        ที่อยู่ : <input type="text" name="address" value="<?=$row["address"]?>"><br>
        เบอร์โทรศัพท์ : <input type="tel" name="mobile" value="<?=$row["mobile"]?>"><br>
        อีเมลล์ : <input type="email" name="email" value="<?=$row["email"]?>"><br>
        <input type="submit" value="แก้ไขข้อมูลสมาชิก">
    </form>
</body>
</html>