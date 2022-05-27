<?php
session_start();


include "db_conn.php";
$sql = "SELECT name, seeds
                FROM users ORDER BY seeds DESC";
$rank = 1;
// $result = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($result)) {
//         echo "Leaderboard<br>";
//         while ($row = mysqli_fetch_assoc($result)) {
//             echo "<td>{$rank}</td>
//                   <td>{$row['name']}</td>
//                   <td>{$row['seeds']}</td><br>";

//             $rank++;
//         }
//     }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <h1 class="text-center">Leaderboard</h1>
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