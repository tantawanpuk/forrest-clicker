<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>SIGN UP</title>
     <link href="assets/logo.png" rel="icon">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
     <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
     <div class="container">
          <div class="full-width d-flex justify-content-center align-items-center">
               <form action="signup-check.php" method="post" class="rounded-3 p-4 p-sm-3">
                    <div class="m-5">
                         <h2 class="text-center text-success head-font">SIGN UP</h2>
                         <?php if (isset($_GET['error'])) { ?>
                              <p class="alert alert-danger fw-bold" role="alert"><?php echo $_GET['error']; ?></p>
                         <?php } ?>

                         <?php if (isset($_GET['success'])) { ?>
                              <p class="alert alert-success fw-bold" role="alert"><?php echo $_GET['success']; ?></p>
                         <?php } ?>

                         <label class="form-label text-success fw-bold">Name</label>
                         <?php if (isset($_GET['name'])) { ?>
                              <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
                         <?php } else { ?>
                              <input class="form-control" type="text" name="name" placeholder="Name"><br>
                         <?php } ?>

                         <label class="form-label text-success fw-bold">User Name</label>
                         <?php if (isset($_GET['uname'])) { ?>
                              <input class="form-control" type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br>
                         <?php } else { ?>
                              <input class="form-control" type="text" name="uname" placeholder="User Name"><br>
                         <?php } ?>

                         <label class="form-label text-success fw-bold">Password</label>
                         <input class="form-control" type="password" name="password" placeholder="Password"><br>

                         <label class="form-label text-success fw-bold">Re Password</label>
                         <input class="form-control" type="password" name="re_password" placeholder="Re_Password"><br>
                         <div class="row justify-content-center">
                              <button type="submit" class="btn btn-success mb-2">Sign Up</button>
                              <a class="text-center text-success" href="index.php">Already have an account?</a>
                         </div>
               </form>
          </div>
     </div>
     </div>
</body>

</html>