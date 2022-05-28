<?php
error_reporting(0);
session_start();
if ($_SESSION['user_name'] == 'admin') {

    include "db_conn.php";
    $sql = "SELECT id, user_name, name, seeds
                FROM users ORDER BY seeds DESC";
    $rank = 1;

    //delete
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deleteuser = $conn->query("DELETE FROM users WHERE id = $delete_id");

        if ($deleteuser) {
            echo "<script>alert('User has been deleted successfully');</script>";
            header("refresh:1; url=leaderboard.php");
        }
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Leaderboard</title>
        <link href="assets/logo.png" rel="icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <h1 class="text-center head-font">Leaderboard</h1>
                <table class="table table-success text-center table-striped" style="width: 700px;">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Seeds</th>
                            <th>Delete User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                       <tr>
                        <td><?php echo $rank ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['seeds']; ?></td>
                          <td><?php if($row['user_name'] != 'admin'){ 
                          ?><a onclick="return confirm('Want to delete the User?');" href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a><?php } ?></td>
                          </tr>
                          <?php 
                                $rank++;
                        }}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    include "db_conn.php";
    $sql = "SELECT name, seeds
                FROM users ORDER BY seeds DESC";
    $rank = 1;
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leaderboard</title>
        <link href="assets/logo.png" rel="icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <h1 class="text-center head-font">Leaderboard</h1>
                <table class="table table-success text-center table-striped" style="width: 700px;">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Seeds</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                        <td>" . $rank . "</td>
                          <td>" . $row['name'] . "</td>
                          <td>" . $row['seeds'] . "</td>
                          </tr>";
                                $rank++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
<?php
}
?>