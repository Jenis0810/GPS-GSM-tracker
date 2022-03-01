<!DOCTYPE html>
<?php
// to connect to the database
include 'db.php';

// to check if the user is logged in
if(!isset($_SESSION['email'])){
    header("location: index.php"); // if not logged in, redirect to the login page
}
if(isset($_GET['latitude']) && isset($_GET['longitude']) && isset($_GET['id'])){ // if the data is sent using GET method
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    $id = $_GET['id']." ".$_GET['type']."<br>".$_GET['datetime'];
   
}else{
$sql = "SELECT * FROM tracker ORDER BY ID DESC LIMIT 1"; // to get the last location
$q = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($q);
$longitude = $row['longitude'];
$latitude = $row['latitude'];
$id = $row['tracker_id']. " ".$row['gsmogps']."<br>".$row['datetime'];
}

?>
        <html>
           <head>
              <title>Fleet Management System</title>
              <link rel="stylesheet" href="dist/css/app.css">
              <link rel = "stylesheet" href = "https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
              
           </head>
<body>
             <div class="container">
                
              <div class="content">
                 <div id = "map" style = "text-align:center; width: 900px; height: 580px"></div>
              </div>
              <h2 class="title">Location</h2>
              
                <h3> <a class="title" href="user.php">Back</a> </h3>
              
             </div>
               <script src = "https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
              <script>
                 // Creating map options
                 var mapOptions = {
                    center: [<?=$latitude?>,<?=$longitude?>],
                    zoom: 16
                 }
                 
                 // Creating a map object
                 var map = new L.map('map', mapOptions);
                 var marker = L.marker([<?=$latitude?>,<?=$longitude?>]).addTo(map);
                 
                 var circle = L.circle([<?=$latitude?>,<?=$longitude?>], {
                 color: 'blue',
                 fillColor: 'skyblue',
                 fillOpacity: 0.5,
                 radius: 200
               }).addTo(map);

                 marker.bindPopup("<?=$id?>").openPopup();
                 // Creating a Layer object
                 var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                 
                 // Adding layer to the map
                 map.addLayer(layer);
              </script>
           </body>
           </html>
           