<?php
  header('Content-Type: text/html; charset=utf-8');
  include "lib/nusoap.php";
  //include 'function.php';
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

  <style>
      /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
      .row.content {height: 1000px}
      
      
      /* Set gray background color and 100% height */
      .sidenav {
        background-color: #f1f1f1;
        height: 100%;
      }
      
      /* Set black background color, white text and some padding */
      footer {
        background-color: #555;
        color: white;
        padding: 15px;
      }
      
      /* On small screens, set height to 'auto' for sidenav and grid */
      @media screen and (max-width: 767px) {
        .sidenav {
          height: auto;
          padding: 15px;
        }
        .row.content {height: auto;} 
      }
      .scrollable-table {
      height: auto;
      max-height: 850px;
      overflow-x: hidden;
      }
    </style>

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
                      google.maps.event.addListener(marker,'click',function() {
                        map.setZoom(15);
                        map.setCenter(marker.getPosition());
                        });
                      }
                      google.maps.event.addDomListener(window, 'load', initialize);
                      </script>

</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-4 sidenav">
      <h4>E-POD getWebStation</h4>
        <div class="form-group">
        <label for="">ศูนย์</label>
          <form method="post" action="">
          <select class="form-control" name="station_id" id="station_id">
            <option value="#"selected>เลือกศูนย์</option>
            <?php
              $client = new nusoap_client("http://58.137.5.126/epodws/Service.asmx?wsdl",true);
              $client->soap_defencoding = 'UTF-8';
              $client->decode_utf8 = false;
              $client->encode_utf8 = true;

              $endpoint = "http://58.137.5.126/epodws/service.asmx?wsdl";
              $client->forceEndpoint = $endpoint;


              $params = array(
                      'station_id'=>''
              );
              $data = $client->call('getWebStation', $params);
              //print_r($data);
              //echo '<pre>';
              //var_dump($data);
              $mydata = json_decode($data["getWebStationResult"],true); // json decode from web service
              $count_data  = count($mydata['array']);
              //echo $count_data;
              for ($i=0; $i < $count_data; $i++) { 
                echo "<option value=\"{$mydata["array"][$i]["station_id"]}\" >{$mydata["array"][$i]["station"]}</option></option>";
              }
            ?>
          </select>
      <div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">ตกลง</button>
      </div>

          </form>
    </div>
  <div class="scrollable-table">
  <form name="Courier" method="post" action="code.php">

  <?php
          $client = new nusoap_client("http://58.137.5.126/epodws/Service.asmx?wsdl",true); 
          $client->soap_defencoding = 'UTF-8';
          $client->decode_utf8 = false;
          $client->encode_utf8 = true;

          $endpoint = "http://58.137.5.126/epodws/service.asmx?wsdl";
          $client->forceEndpoint = $endpoint;

          $params = array(
                     // 'station_id' => $_POST['station_id']
                        'station_id' => '29'
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
                  # code...
                
                ?>
                    <tr>
                    <td><a href=""><?php echo $mydata["array"][$i]['car_licence']; ?></a></td>
                    <td><?php echo $mydata["array"][$i]['driver_name']; ?></td>
                    <td align="center">
                      <?php 
                        if ($mydata["array"][$i]['driver_status']!='12') {
                          echo "<span class=\"glyphicon glyphicon-ok-circle\" aria-hidden=\"true\"\ style=\"color:green\"></span>";
                        }else{
                          echo "<span class=\"glyphicon glyphicon-ban-circle\" aria-hidden=\"true\"\ style=\"color:red\"></span>";
                        }
                      ?>
                    </td>
                    <td align="center">
                      <?php 
                        if ($mydata["array"][$i]['battery_level']<='50') {
                          //echo $mydata["array"][$i]['battery_level'];
                          echo "<span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"\ style=\"color:#ffbf00\"></span>";
                          echo $mydata["array"][$i]['battery_level'];
                          echo "<span class=\"glyphicon glyphicon-flash\" aria-hidden=\"true\"\ style=\"color:#00e6e6\"></span>";
                        }else{
                          //echo $mydata["array"][$i]['battery_level'];
                          echo "<span class=\"glyphicon glyphicon-phone\" aria-hidden=\"true\"\ style=\"color:#009900\"></span>";
                          echo $mydata["array"][$i]['battery_level'];
                          echo "<span class=\"glyphicon glyphicon-flash\" aria-hidden=\"true\"\ style=\"color:#00e6e6\"></span>";
                        }
                      ?>
                    </td>
                    <?php  $mydata["array"][$i]['latitude']; ?>
                    <?php  $mydata["array"][$i]['longitude']; ?>
                    </tr>
                <?php
                }
                ?>
                </table>
    </div>
  </div>
</form>

    <div class="col-sm-8">
      <h4><small>MAP</small></h4>
      <hr>
      <div id="mapDiv"></div>
        <form name="google-map" method="post">

        <div id="googleMap" style="width:auto;height:680px;"></div>
        </form>
          <hr>
        </div>
      </div>
    </div>

  <footer class="container-fluid">
    <div align="center">
      <p>Inter Express Logistics</p>
    </div>
  </footer>

</body>
</html>