<!DOCTYPE html>
<html>
    <head>
        <title>
            Fleet Management System
        </title>
    </head>
    <body>
<?php
include 'db.php';

    //store the variable from the url
    $type1 = $_GET['type1'];
    $gpsid = $_GET['gpsid'];
    $datetime = $_GET['datetime'];
    $satellite = $_GET['satellite'];
    $type2 = $_GET['type2'];
    $gsmid = $_GET['gsmid'];
    $mcc = $_GET['mcc'];
    $mnc = $_GET['mnc'];
    $lac = $_GET['lac'];
    $cellid1 = $_GET['cellid1'];
    $signal1 = $_GET['signal1'];
    $cellid2 = $_GET['cellid2'];
    $signal2 = $_GET['signal2'];
    $cellid3 = $_GET['cellid3'];
    $signal3 = $_GET['signal3'];
    $cellid4 = $_GET['cellid4'];
    $signal4 = $_GET['signal4'];
    $cellid5 = $_GET['cellid5'];
    $signal5 = $_GET['signal5'];
    $cellid6 = $_GET['cellid6'];
    $signal6 = $_GET['signal6'];
    $cellid7 = $_GET['cellid7'];
    $signal7 = $_GET['signal7'];
    
     
    if($satellite < 3){  // if the gps got data from less than 3 satellites, then it is not reliable, so we will use gsm data to calculate the location

        // method 1 to calculate the location using opencellid api
        $url = "https://www.opencellid.org/cell/get?key=$key&radio=$type2&mcc=$mcc&mnc=$mnc&lac=$lac&cellid=$cellid1&format=json";
        $json = file_get_contents($url);
        $obj1 = json_decode($json, true);
        $longitude1 = $obj1['lon'];
        $latitude1 = $obj1['lat'];

        // method 2 to calculate the location using unwired api        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://eu1.unwiredlabs.com/v2/process.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"token\": \"$key2\",\"radio\": \"$type2\",\"mcc\": $mcc,\"mnc\": $mnc,\"cells\": [{\"lac\": $lac,\"cid\":$cellid1,\"signal\":$signal1},{\"lac\": $lac,\"cid\":$cellid2,\"signal\":$signal2},{\"lac\": $lac,\"cid\":$cellid3,\"signal\":$signal3},{\"lac\": $lac,\"cid\":$cellid4,\"signal\":$signal4},{\"lac\": $lac,\"cid\":$cellid5,\"signal\":$signal5},{\"lac\": $lac,\"cid\":$cellid6,\"signal\":$signal6},{\"lac\": $lac,\"cid\":$cellid7,\"signal\":$signal7}],\"address\": 1}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err; // if any error occurs, print it out, decription of the error can be found in the web page 'https://unwiredlabs.com/api#documentation'

            // request new data from GPS/GSM    
                
        } else {
            
            $obj2 = json_decode($response, true); // convert the response to json format

            $longitude2 = $obj2['lon'];
            $latitude2 = $obj2['lat'];
            
            // average the two methods to get the a more precise location
            if(isset($latitude1)&&isset($longitude1)&&isset($latitude2)&&isset($longitude2)){ // if the two methods got data, then average them
                $latitude = ($latitude1+$latitude2)/2;
                $longitude = ($longitude1+$longitude2)/2;
            }
            else if(isset($latitude1)&&isset($longitude1)){ // if only the first method got data, then use it
                $latitude = $latitude1;
                $longitude = $longitude1;
            }
            else if(isset($latitude2)&&isset($longitude2)){ // if only the second method got data, then use it
                $latitude = $latitude2;
                $longitude = $longitude2;
            }

            $type = 'gsm'; // the type of the location is gsm
            
        }




    }
    else{ // if the gps got data from more than 3 satellites, then it is reliable, so we will use gps data to calculate the location

        $longitude = $_GET['longitude'];
        $latitude = $_GET['latitude'];
        $type = 'gps'; // the type of the location is gps

    }   

    // by here we know which data is reliable
        // echo $latitude."<br>";
        // echo $longitude; 

    // insert the data into the database

    //if the valid data is from gps
    if($type == 'gps'){

        $sql = "INSERT INTO tracker (tracker_id, `gsmogps`,`datetime`, longitude, latitude) VALUES ('$gpsid', '$type','$datetime', '$longitude', '$latitude' )";

    }
    else if($type == 'gsm'){ // if the valid data is from gsm
        

        $sql = "INSERT INTO tracker (tracker_id, `gsmogps`,`datetime`, longitude, latitude, mcc, mnc, lac, cellid1, signal1, cellid2, signal2, cellid3, signal3, cellid4, signal4, cellid5, signal5, cellid6, signal6, cellid7, signal7) VALUES ('$gsmid','$type', '$datetime', '$longitude', '$latitude', '$mcc', '$mnc', '$lac', '$cellid1', '$signal1', '$cellid2', '$signal2', '$cellid3', '$signal3', '$cellid4', '$signal4', '$cellid5', '$signal5', '$cellid6', '$signal6', '$cellid7', '$signal7' )";
    
    }
    $q = mysqli_query($conn, $sql);
    if($q){
        echo "success";
    }
    else{
        echo "fail to store the data";
        
        //request new data from GPS/GSM
    }


        ?>
       

    </body>
</html>
    
    