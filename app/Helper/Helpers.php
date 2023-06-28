<?php 
 namespace App\Helper;
 use Request;
use App\Models\Message;
use App\Models\User;
use gocardless;
Class Helpers{


public function getcurrentIp(){

	 $ip = Request::ip(); 
    $ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));
    return $ipdat;
}



public  function gocardless(){
$key = config('gocardless.GOCARDLESS_API_KEY');

$client = new \GoCardlessPro\Client([   
    // 'access_token' =>'sandbox_GEg_UUapt1ghcttG8d3lPjgxmoPan6whCTRYIfIt',
  'access_token' =>$key,
    // Change me to LIVE when you're ready to go live
    'environment' => \GoCardlessPro\Environment::SANDBOX
]);
return $client;
}
public static  function  notification(){

$message = Message::orderBy('id', 'DESC')->take(1)->get();

return $message;

}


}



?>