<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>getTruckManifestPOD</title>

	<link rel="stylesheet" href="assets/bootstrap3.3.6/css/bootstrap.min.css">
	<script src="assets/jquery/jquery-1.12.3.min.js"></script>
	<script src="assets/bootstrap3.3.6/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container-fluid content-container">

<form class="form-horizontal" action="" method="post" data-parsley-validate>
<?php

					include("lib/nusoap.php");
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
					//var_dump(json_decode($data["getTruckManifestPODResult"]));
					//var_dump($data);
					//echo '</pre><hr />';
					echo "<br><hr>";
					//echo $data["getTruckManifestPODResult"];

					$mydata = json_decode($data["getWebStationResult"],true); // json decode from web service

					//echo '{"simple":'.json_encode($mydata).'}';

					// echo $mydata["array"][0]['doc_id'];
					$count_data  = count($mydata['array']);
					//echo $count_data;

					if(count($count_data) == 0)
					{
						echo "Not found data!";
					}
					else
					{

					}
?>

								<table class="table table-bordered">
								  <tr>
									<th>station_id</th>
									<th>station</th>
								  </tr>
								<?php
								// foreach ($mydata as $result) {
								// for ($i=0; $i < 10; $i++) { 
								for ($i=0; $i < $count_data; $i++) { 
									# code...
								
								?>
									  <tr>
										
										<td><?php echo $mydata["array"][$i]['station_id']; ?></td>
										<td><?php echo $mydata["array"][$i]['station']; ?></td>
									  </tr>
								<?php
								}
								?>
								</table>
</form>
</div>
</body>
</html>