<?php
session_start();

			if($_POST["strUser"] and $_POST["strPass"] != "")
				{
					include("lib/nusoap.php");
					$client = new nusoap_client("http://58.137.5.124/epodws/Service.asmx?wsdl",true); 
					$params = array(
							   'strUser' => $_POST["strUser"],
							   'strPass' => $_POST["strPass"]
					);

					$data = $client->call('checkWebLogin', $params);
					print_r($data);

					//echo '<pre>';
					//var_dump($data);

					echo '</pre><hr />';

			}
?>