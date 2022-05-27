<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<div class="container">
		<div class="full-width d-flex justify-content-center align-items-center">
			<form action="login.php" method="post" class="rounded-3 p-4 p-sm-3">
				<div class="m-5">
					<h1 class="logo text-center text-success">Forest Clicker</h1>
					<?php if (isset($_GET['error'])) { ?>
						<p class="alert alert-danger fw-bold" role="alert"><?php echo $_GET['error']; ?></p>
					<?php } ?>
					<label class="form-label text-success fw-bold">User Name</label>
					<input type="text" name="uname" placeholder="User Name" class="form-control"><br>

					<label class="form-label text-success fw-bold">Password</label>
					<input type="password" name="password" placeholder="Password" class="form-control"><br>
					<div class="row justify-content-center">
						<button type="submit" class="btn btn-success mb-2">Login</button>
						<div class="row">
							<p class="text-center text-success">Not have account?&nbsp;&nbsp;&nbsp;<a href="signup.php" class="text-success">Sign up!</a></p>
						</div>

					</div>
				</div>
		</div>

		</form>
	</div>
	</div>
</body>

</html>