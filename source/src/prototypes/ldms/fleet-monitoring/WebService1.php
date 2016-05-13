<html>
<head>
<title>ThaiCreate.Com</title>
    <meta Content-Type: text/xml; charset=utf-8>
</head>
<body>
<?php
		include("lib/nusoap.php");
        $client = new nusoap_client("http://192.168.0.15/epodws/?wsdl",true); 
        $params = array(
                   // 'strEmpId' => "111"
                   'strJobNo' => "JHO160425123"
        );
       $data = $client->call("getTruckManifestPOD",$params); 
       print_r($data);

	   echo "<hr>";
	   
	   echo $data["getTruckManifestPODResult"];
?>
</body>
</html>