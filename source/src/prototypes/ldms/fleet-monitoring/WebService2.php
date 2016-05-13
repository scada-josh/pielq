<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
		include("lib/nusoap.php");
        $client = new nusoap_client("http://localhost:5377/getCustomerDetail.asmx?wsdl",true); 
        $params = array(
                   'strCusID' => "C001"
        );
       $data = $client->call("DetailCustomer",$params); 
       print_r($data);
?>
</body>
</html>