<?php
// to connect to the database
include 'db.php';
// to check if the session is set
if(!isset($_SESSION['email'])){
    header("location: index.php"); // if the session is not set, redirect to the login page
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover ">
                    <thead class="table-dark">
                        <tr>    
                            <!-- table headings -->
                            <th scope="col">#</th>
                            <th scope="col">Tracker Id</th>
                            <th scope="col">Type of Tracker</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">longitude</th>
                            <th scope="col">MCC</th>
                            <th scope="col">MNC</th>
                            <th scope="col">LAC</th>
                            <th scope="col">CELL IDS</th>
                            <th scope="col">SIGNAL</th>
                            <th scope="col">MAP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $sql = "SELECT * FROM tracker"; // to select all the data from the table
                            $result = mysqli_query($conn, $sql);
                            $i = 1; // to count the number of rows
                            while($q = mysqli_fetch_row($result)){
                                ?>
                                <th scope="row"><?php echo $i; ?></th>
                                <?php
                                echo "<td>".$q[1]."</td>";
                                echo "<td>".$q[2]."</td>";
                                echo "<td>".$q[3]."</td>";
                                echo "<td>".$q[4]."</td>";
                                echo "<td>".$q[5]."</td>";
                                if(isset($q[6])){
                                    echo "<td>".$q[6]."</td>";
                                }else{
                                    echo "<td>-</td>";
                                }
                                if(isset($q[7])){
                                    echo "<td>".$q[7]."</td>";
                                }else{
                                    echo "<td>-</td>";
                                }
                                if(isset($q[8])){
                                    echo "<td>".$q[8]."</td>";
                                }else{
                                    echo "<td>-</td>";
                                }
                                if(isset($q[9]) && isset($q[11]) && isset($q[13]) && isset($q[15]) && isset($q[17]) && isset($q[19]) && isset($q[21]) ){
                                echo "<td>".$q[9]." ".$q[11]." ".$q[13]." ".$q[15]." ".$q[17]." ".$q[19]." ".$q[21]."</td>"; // to display the cell ids
                                }else{
                                    echo "<td>-</td>";
                                }
                                if(isset($q[10]) && isset($q[12]) && isset($q[14]) && isset($q[16]) && isset($q[18]) && isset($q[20]) && isset($q[22]) ){
                                echo "<td>".$q[10]." ".$q[12]." ".$q[14]." ".$q[16]." ".$q[18]." ".$q[20]." ".$q[22]."</td>"; // to display the signals
                                }else{
                                    echo "<td>-</td>";
                                }
                                ?>
                                <!-- a link to the map -->
                                <td><a href="map.php?latitude=<?=$q[4]; ?>&longitude=<?=$q[5]; ?>&id=<?=$q[1]?>&type=<?=$q[2];?>&datetime=<?=$q[3]?>" target="_blank">Map</a></td>
                                <?php
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
                </div>
                <a role="button" href="user.php" class="btn btn-primary btn-lg btn-block">Back</a>
            </div>
        </div>
    </div>
    
</body>
</html>