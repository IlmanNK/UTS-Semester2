<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css\style.css">
	<!--===============================================================================================-->
</head>

<body id="bg-login">
	<div class="box-login">
		<h2>Login</h2>
		<form action="" method="POST">

			<input type="text" name="user" placeholder="Nama pengguna" class="input-control">
			<input type="password" name="pass" placeholder="Kata Sandi" class="input-control">
			<input type="submit" name="submit" placeholder="Masuk" class="btn">

		</form>
	
	<?php
	if (isset($_POST["submit"])) {
		session_start();
		include 'db.php';

		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$pass = mysqli_real_escape_string($conn, $_POST['pass']);

		$cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '" . $user . "' AND password = '" . 	MD5($pass) . "'");
		if(mysqli_num_rows($cek) > 0){
			$d = mysqli_fetch_object($cek);
			$_SESSION['status_login'] = true;
			$_SESSION['a_global'] = $d;
			$_SESSION['id'] = $d->admin_id;
			echo '<script>window.location="index.php"</script>' ;
		}else{
			echo '<script>alert("Username atau Password Anda salah")</script>';
		}
	}
	?>
	</div>


	


</body>

</html>