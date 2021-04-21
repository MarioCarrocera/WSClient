<?php
include_once '../NuSoap/nusoap.php';

/* change to yor url web server */
$wsdl = 'http://desarrollo.ontime.ink/Demo/wsserver/WSOTCore.php?wsdl';

$client = new nusoap_client($wsdl, FALSE);
$err = $client->getError();
if ($err) {
   echo '<h2>Constructor error</h2>' . $err;
   exit();
}

$result1=$client->call('PssChk', array('admin','OT2021Free'));

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result1);
    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>PssChk r</h2>";
        echo $result1;
    }
}

$result1=$client->call('Conect', array('admin','OT2021Free'));

if ($client->fault) {
	echo "<h2>Fault</h2><pre>";
	print_r($result1);
	echo "</pre>";
} else {
	$error = $client->getError();
	if ($error) {
		echo "<h2>Error</h2><pre>" . $error . "</pre>";
	} else {
		echo "<h2>logout r</h2>";
		echo $result1;
	}
}

?>
