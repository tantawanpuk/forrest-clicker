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
          <title>Forest Clicker</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
          <link rel="stylesheet" type="text/css" href="home.css">
     </head>

     <body class="d-flex flex-column min-vh-100">
          <nav class="navbar navbar-expand-lg bg-success color-custom navbar-dark sticky-top">
               <div class="container-fluid text-black">
                    <a href="change-password.php" class="nav-link text-white" aria-current="page">Change Password</a>
                    <h1 class="logo">Forest Clicker&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                    <a class="nav-link text-white" href="logout.php">Logout</a>
               </div>
          </nav>
          <div class="container">
               <div class="row text-center">
                    <div id="seedContainer" class="mt-2 head-font">
                         <h3>Seeds: <span id="showSeed"></span></h3>
                         <div id="spsContainer">Seed per second: <span id="showSps"></span></div>
                    </div>
               </div>
               <div class="text-center">

                    <img src="assets/seed.png" width="auto" height="200" class="rounded" onclick="game.getSeed()" alt="Seed">
               </div>
               <p class="text-center" style="color: green;">Click on this picture!</p>
               <div class="row text-center">
                    <div class="col-lg-3 mb-4">
                         <img src="assets/sapling.png" id="BuyPicSapling" width="auto" height="100" class="rounded mb-1" onclick="game.getSapling()" alt="Sapling">
                         <div id="saplingContainer" class="mb-1" style="color: green;">Saplings: <span id="saplingCount"></span></div>
                         <button class="btn btn-success btn-sm" id="BuySapling">Buy Sapling (<span id="saplingCost"></span> Seeds)</button>
                    </div>

                    <div class="col-lg-3 mb-4">
                         <img src="assets/tree.png" id="BuyPicTree" width="auto" height="100" class="rounded mb-1" onclick="game.getTree()" alt="Tree">
                         <div id="treeContainer" class="mb-1" style="color: green;">Trees: <span id="treeCount"></span></div>
                         <button class="btn btn-success btn-sm" id="BuyTree">Buy Tree (<span id="treeCost"></span> Seeds)</button>
                    </div>

                    <div class="col-lg-3 mb-4">
                         <img src="assets/wood.png" id="BuyPicWood" width="auto" height="100" class="rounded mb-1" onclick="game.getWood()" alt="Wood">
                         <div id="woodContainer" class="mb-1" style="color: green;">Woods: <span id="woodCount"></span></div>
                         <button class="btn btn-success btn-sm" id="BuyWood">Buy Wood (<span id="woodCost"></span> Seeds)</button>
                    </div>
                    <div class="col-lg-3 mb-4">
                         <img src="assets/forest.png" id="BuyPicForest" width="auto" height="100" class="rounded mb-1" onclick="game.getForest()" alt="Forest">
                         <div id="forestContainer" class="mb-1" style="color: green;">Forests: <span id="forestCount"></span></div>
                         <button class="btn btn-success btn-sm" id="BuyForest">Buy Forest (<span id="forestCost"></span> Seeds)</button>

                    </div>
               </div>
               <div class="row mt-2 justify-content-end">
                    <button class="btn btn-danger btn-sm mb-1" style="width: 120px;" onclick="game.clearSave()"> Reset game </button>
               </div>
          </div>

          <!-- footer -->
          <footer class="footer mt-auto text-center" style="background-color: #e0f0e3;">
               <div class="container p-1">
                    <p>Hello <u><strong><?php echo $_SESSION['name']; ?></strong></u> | This game is about planting trees. Click the picture above or the button to plants tree and make background green just like the earth!</p>
                    <p>Can you made it on the top <span><a href="leaderboard.php" class="text-success" target="_blank">leaderboard?</a></span>&#127942</p>
                    <p>You can donate 1$ to plant a real tree here! -> <span><a class="text-success" href="https://teamtrees.org/" target="_blank">#teamtrees</a></span></p>
               </div>
          </footer>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          <script src="app.js"></script>
     </body>

     </html>
<?php
} else {
     header("Location: index.php");
     exit();
}
?>