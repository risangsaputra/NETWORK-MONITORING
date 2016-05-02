<?php
			require('routeros_api.class.php');

			define('MIKROTIK_IP', '192.168.12.1');
			define('MIKROTIK_USERNAME', 'admin');
			define('MIKROTIK_PASSWORD', '');
			define('SERVER', 'all');
			define('PROFILE', 'default');

			//$password]= "isna";
			$API = new routeros_api();
			// Aktifkan debug
			// $API->debug = true;
			if ($API->connect(MIKROTIK_IP, MIKROTIK_USERNAME, MIKROTIK_PASSWORD))
				{
						$API->write('/ip/add/add',false);
						$API->write('=address=192.168.13.1/24',false);
						$API->write('=interface=ether2');										
						$ARRAY = $API->read();
				}
			
			$API->disconnect();
			echo "<p>Aturan telah ditambahkan..<br>";
			
			print_r($output);

?>

