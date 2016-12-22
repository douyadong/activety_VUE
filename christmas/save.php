<?php
function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
?>


<?php
	$imgData = $_POST["dataURI"];//
	$s = base64_decode(str_replace('data:image/png;base64,', '', $imgData));
	$guid = GUID();
	if(file_put_contents($guid.".jpg", $s)){//成功
        echo '{"status":1,"GUID":"' . $guid  . '"}';
    } else{
        echo '{"status":0,"message":"' . $errorArray[0] . '"}';
    }
?>