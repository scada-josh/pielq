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

<br>
<center><h2 class="form-signin-heading">PLASE SIGN IN</h2></center>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="input" class="col-sm-4 control-label">strEmpId</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="strEmpId" name="strEmpId">
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="input" class="col-sm-4 control-label">strJobNo</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="strJobNo" name="strJobNo">
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="col-sm-4 control-label"></label>
        <div class="col-sm-4">
        <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
      </div>
    </div>
  </div>
</div>

<?php

					include("lib/nusoap.php");
					$client = new nusoap_client("http://192.168.0.15/epodws/Service.asmx?wsdl",true);
					$client->soap_defencoding = 'UTF-8';
			        $client->decode_utf8 = false;
			        $client->encode_utf8 = true;
					$params = array(
								//'strJobNo' => 'JHO160429090'
							   'strEmpId' => $_POST["strEmpId"],
							   'strJobNo' => $_POST["strJobNo"]	   
					);
					$data = $client->call('getTruckManifestPOD', $params);
					//print_r($data);
					//echo '<pre>';
					//var_dump(json_decode($data["getTruckManifestPODResult"]));
					//var_dump($data);
					//echo '</pre><hr />';
					echo "<br><hr>";
					//echo $data["getTruckManifestPODResult"];

					$mydata = json_decode($data["getTruckManifestPODResult"],true); // json decode from web service

					//echo '{"simple":'.json_encode($mydata).'}';

					// echo $mydata["array"][0]['doc_id'];
					if(count($mydata) == 0)
					{
							echo "Not found data!";
					}
					else
					{
?>
								<table class="table table-bordered">
								  <tr>
									<th>doc_id</th>
									<th>sender</th>
									<th>recipient</th>
									<th>recipient_addres</th>
									<th>est_date</th>
									<th>doc_date</th>
									<th>job_type</th>
									<th>qty</th>
									<th>cod_amount</th>
									<th>remark</th>
									<th>db_name</th>
									<th>recipient_id</th>
									<th>phone</th>
								  </tr>
								<?php
								// foreach ($mydata as $result) {
								// for ($i=0; $i < 10; $i++) { 
								for ($i=0; $i < count($mydata); $i++) { 
									# code...
								
								?>
									  <tr>
										
										<td><?php echo $mydata["array"][$i]['doc_id']; ?></td>
										<td><?php echo $mydata["array"][$i]['sender']; ?></td>
										<td><?php echo $mydata["array"][$i]['recipient']; ?></td>
										<td><?php echo $mydata["array"][$i]['recipient_addres']; ?></td>
										<td><?php echo $mydata["array"][$i]['est_date']; ?></td>
										<td><?php echo $mydata["array"][$i]['doc_date']; ?></td>
										<td><?php echo $mydata["array"][$i]['job_type']; ?></td>
										<td><?php echo $mydata["array"][$i]['qty']; ?></td>
										<td><?php echo $mydata["array"][$i]['cod_amount']; ?></td>
										<td><?php echo $mydata["array"][$i]['remark']; ?></td>
										<td><?php echo $mydata["array"][$i]['db_name']; ?></td>
										<td><?php echo $mydata["array"][$i]['recipient_id']; ?></td>
										<td><?php echo $mydata["array"][$i]['phone']; ?></td>
									  </tr>
								<?php
								}
					}
								?>
								</table>
</form>
</div>
</body>
</html>

<script src="assets/js/getTruck.js"></script>

<script>
jQuery(document).ready(function() {
	<?php echo $str_main_init; ?>
	getTruck.init();
});
</script>