<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Change Password</title>
		<link href="assets/logo.png" rel="icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>

	<body>
		<div class="container">
			<div class="full-width d-flex justify-content-center align-items-center">
				<form action="change-p.php" method="post" class="rounded-3 p-4 p-sm-3">
					<div class="m-5">
						<h2 class="text-center text-success head-font">Change Password</h2>
						<?php if (isset($_GET['error'])) { ?>
							<p class="alert alert-danger fw-bold" role="alert"><?php echo $_GET['error']; ?></p>
						<?php } ?>

						<?php if (isset($_GET['success'])) { ?>
							<p class="alert alert-success fw-bold" role="alert"><?php echo $_GET['success']; ?></p>
						<?php } ?>

						<label class="form-label text-success fw-bold">Old Password</label>
						<input class="form-control" type="password" name="op" placeholder="Old Password">
						<br>

						<label class="form-label text-success fw-bold">New Password</label>
						<input class="form-control" type="password" name="np" placeholder="New Password">
						<br>

						<label class="form-label text-success fw-bold">Confirm New Password</label>
						<input class="form-control" type="password" name="c_np" placeholder="Confirm New Password">
						<br>
						<div class="row justify-content-center">
							<button type="submit" class="btn btn-success mb-2">CHANGE</button>
							<a href="home.php" class="text-center text-success">HOME</a>
						</div>
				</form>
			</div>
		</div>
		</div>
	</body>

	</html>

<?php
} else {
	header("Location: index.php");
	exit();
}
?>