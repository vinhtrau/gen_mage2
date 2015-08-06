<?php
$includeInitSetup = true;
$setupString = $includeInitSetup ? "php bin/magento setup:install " : "";
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		if($key == "use-sample-data" || $key == "cleanup-database"){
			$setupString .= " --" . $key;
		}else
			$setupString .= " --" . $key . "=" . $value;
	}
	$return = array("error" => 0);
	$html = '<div id="dialog-message" title="Install string">
	<textarea cols="80" rows="5" id="setup_string">' . $setupString . '</textarea>
</div>';
	$return['html'] = $html;
	echo json_encode($return);
}

