<?php

use Datto\JsonRpc\Client;
use Datto\JsonRpc\Responses\ErrorResponse;
use Datto\JsonRpc\Responses\ResultResponse;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$client = new Client();

$arrayObject = [
    "LPRDetails"=>
        [
            "custId"=> 12,
            "lprUserId"=> "",
            "deviceId"=> "1079",
            "plate"=> "2232775",
            "state"=> "AK",
            "make"=> "MAKE1",
            "model"=> "test",
            "body"=> "TEST1",
            "location"=> "15Min",
            "lat"=> "",
            "long"=> "",
            "photo1"=> "https://fileserveruploads.blob.core.windows.net/percsuploads/Default/2021/02/09/a738c812-c281-4e70-8dc7-3a01a9dd5476.jpg",
            "photo2"=> "https://fileserveruploads.blob.core.windows.net/percsuploads/Default/2021/02/09/7f781d70-372a-4d7d-af05-de7a517a63e8.jpg",
            "photo3"=> "https://fileserveruploads.blob.core.windows.net/percsuploads/Default/2021/02/09/7f781d70-372a-4d7d-af05-de7a517a63e1.jpg",
            "photo4"=> "https://fileserveruploads.blob.core.windows.net/percsuploads/Default/2021/02/09/7f781d70-372a-4d7d-af05-de7a517a63e4.jpg",
            "lprScanId"=> null,
            "lprCameraId"=> null,
            "color"=> "AUTOVHCLCOLOR8646",
            "permit"=> null,
            "permitStatus"=> null,
            "permitType"=> null,
            "dutyGroup"=> null,
            "comments"=> null,
            "violationDesc"=> "Parking Violation",
            "violationCode"=> "PRK",
            "violationId"=> "PRK",
            "status"=> null,
            "firstChalkTime"=> "2021-02-09 19:34:12",
            "lastSeen"=> "2021-02-09 19:37:27",
            "zone"=> "15 MIN"
        ]
    ];
$client->query(1, 'notifyLPR', $arrayObject);
$message = $client->encode();
echo $message;
?>