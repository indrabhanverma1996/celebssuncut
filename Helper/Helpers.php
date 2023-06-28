<?php 
namespace App\Helper;

class Helpers {


public static function getcurrentIp(Request $request){

	$ip =  $_SERVER['REMOTE_ADDR']; 

    $ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));
}


}



?>