<?php

 namespace App\onfido;

 



  class Onfidoapi

  {

    #Get Category Data From Category Model

    static function apitoken()

	{

 require_once(__DIR__ . '/vendor/autoload.php');

$config = vendor\onfido\Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'token=' . 'api_sandbox.qk1YmVF9dT5.8o2a5UTLF2rO2p7Ef835p1zjCKnc0gXg');
$config->setApiKeyPrefix('Authorization', 'Token');

// Limit the at-rest region, if needed (optional, see https://documentation.onfido.com/#regions)
// $config->setHost($config->getHostFromSettings(1, array("region" => "eu")));

$apiInstance = new Onfido\Api\DefaultApi(null, $config);
$applicantDetails = new Onfido\Model\ApplicantRequest();

$applicantDetails->setFirstName('Jane');
$applicantDetails->setLastName('Doe');
$applicantDetails->setDob('1990-01-31');

$address = new \Onfido\Model\Address();
$address->setBuildingNumber('100');
$address->setStreet('Main Street');
$address->setTown('London');
$address->setPostcode('SW4 6EH');
$address->setCountry('GBR');
print_r($address);
die;
$applicantDetails->setAddress($address);

$applicant = $apiInstance->createApplicant($applicantDetails);
$applicantId = ($applicant)->getId();



$type = 'passport';
$file = 'C:\Users\DELL\Pictures\indrabhandocuments (1)/id.jpg';
$side = 'front';


$document =$apiInstance->uploadDocument($applicantId, $type, $file, $side);
$docuid = ($document)->getId();

$checkData = new Onfido\Model\CheckRequest();
$checkData->setApplicantId($applicantId);
$checkData->setReportNames(array('document', 'facial_similarity_photo'));

$check = $apiInstance->createCheck($check_data);
$checkId = ($check)->getId();
$reportIds = ($check)->getReportIds();

$file1 = 'C:\Users\DELL\Pictures\WhatsApp_files\185273595_124840550206173_3789645399397283414_n.jpg';

$live_photos = $apiInstance->uploadLivePhoto($applicantId, $file1);

    }

  }





?>