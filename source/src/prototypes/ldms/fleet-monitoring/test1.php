<?php
  header('Content-Type: text/html; charset=utf-8');
  include "lib/nusoap.php";
  //include 'function.php';
  $_POST['station_id']	=	29;

?>
<html>
<head>
<title>getWebStation</title>
  <meta Content-Type: text/xml; charset=utf-8>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//js.arcgis.com/3.13/esri/css/esri.css">   
  <link rel="stylesheet" type="text/css" href="http://esri.github.io/bootstrap-map-js/src/css/bootstrapmap.css"> 
  <script src="assets/jquery/jquery-1.12.3.min.js"></script>
  <script src="assets/bootstrap3.3.6/js/bootstrap.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>

  <script>
function initialize() {
var myCenter=new google.maps.LatLng(13.612694,100.547933);
var marker;
  var mapProp = {
    center:new google.maps.LatLng(13.612694,100.547933),
    zoom:10,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

  </head>
<body>
<form>
<?php
          $client = new nusoap_client("http://58.137.5.126/epodws/Service.asmx?wsdl",true); 
          $client->soap_defencoding = 'UTF-8';
          $client->decode_utf8 = false;
          $client->encode_utf8 = true;
          $params = array(
                     'station_id' => $_POST['station_id']
          );

          $data = $client->call("getWebCourierList",$params);
          //print_r($data);
          $mydata = json_decode($data["getWebCourierListResult"],true); // json decode from web service
          //print_r($mydata);
          //var_dump($mydata);
          //echo '</pre><hr />';
          //echo "<br>";
           //echo $mydata[$mydata][0]['car_licence'];

          $count_data  = count($mydata['array']);
          //echo $count_data;

          //echo count($mydata);
  if(count($count_data) == 0)
            {
              echo "Not found data!";
            }
            else
            {

            }
  ?>
                <table class="table table-bordered">
                  <tr class="danger">
                  <th>ทะเบียนรถ</th>
                  <th>ชื่อคนขับรถ</th>
                  <th>สถานะ</th>
                  <th>แบตเตอรี่</th>
                  </tr>
                <?php
                // foreach ($mydata as $result) {
                // for ($i=0; $i < 10; $i++) { 
                for ($i=0; $i < $count_data; $i++) { 

                    $car_licence = $mydata["array"][$i]['car_licence'];
                    $driver_name = $mydata["array"][$i]['driver_name'];
                    $driver_status = $mydata["array"][$i]['driver_status'];
                    $battery_level	= $mydata["array"][$i]['battery_level'];
                	$latitude = $mydata["array"][$i]['latitude'];	
                    $longitude = $mydata["array"][$i]['longitude'];
                    	// echo $car_licence;
                    	// echo $driver_name;
                    	// echo $driver_status;
                    	// echo $battery_level;
                    	// echo $latitude;
                    	// echo $longitude;
                    ?>
         ?>
                    <tr>
            		<?php
						echo "<td><a href=\"?car_licence=$car_licence\">$car_licence<i class=\"fa fa-pencil-square-o\"></i></a></td>";?>
                    <td><?php echo $driver_name; ?></td>
                    <td align="center">
                      <?php 
                        if ($driver_status!='12') {
                          echo "<span class=\"glyphicon glyphicon-ok-circle\" aria-hidden=\"true\"\ style=\"color:green\"></span>";
                        }else{
                          echo "<span class=\"glyphicon glyphicon-ban-circle\" aria-hidden=\"true\"\ style=\"color:red\"></span>";
                        }
                      ?>
                    </td>
                    <td align="center">
                      <?php 
                        if ($battery_level<='50') {
                          //echo $mydata["array"][$i]['battery_level'];
                          echo "<span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"\ style=\"color:#ffbf00\"></span>";
                          echo $battery_level;
                          echo "<span class=\"glyphicon glyphicon-flash\" aria-hidden=\"true\"\ style=\"color:#00e6e6\"></span>";
                        }else{
                          //echo $mydata["array"][$i]['battery_level'];
                          echo "<span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"\ style=\"color:#009900\"></span>";
                          echo $battery_level;
                          echo "<span class=\"glyphicon glyphicon-flash\" aria-hidden=\"true\"\ style=\"color:#00e6e6\"></span>";
                        }
                      ?>
                    </td>
                    </tr>
        <?php
                }
        ?>
                </table>
    </div>
  </div>
</form>
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>
</html>