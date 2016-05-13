<?php
header('Content-Type: text/html; charset=utf-8'); 

  function getwebstation(){
          include("../lib/nusoap.php");
          $client = new nusoap_client("http://58.137.5.126/epodws/Service.asmx?wsdl",true);
          $client->soap_defencoding = 'UTF-8';
              $client->decode_utf8 = false;
              $client->encode_utf8 = true;
          $params = array(
                  'station_id'=>'1'
          );
          $data = $client->call('getWebStation', $params);
          //print_r($data);
          //echo '<pre>';
          $mydata = json_decode($data["getWebStationResult"],true); // json decode from web service

          // echo $mydata["array"][0]['doc_id'];
          $count_data  = count($mydata['array']);
          //echo $count_data;

          for ($i=0; $i < $count_data; $i++) { 
            echo $station_id =  $mydata["array"][$i]['station_id'];
            echo $station  =  $mydata["array"][$i]['station'];
            echo "<hr>";
          }
          return "#".$station_id .$station;
  }

//echo  getwebstation();
?>