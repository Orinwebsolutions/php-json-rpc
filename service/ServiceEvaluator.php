<?php
namespace Service;
include('../src/Evaluator.php');

use Datto\JsonRpc\Evaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\MethodException;

class ServiceEvaluator implements Evaluator
{

    public function evaluate($method, $arguments)
    {
        // return true;
        if ($method === 'notifyLPR') {
            return self::notifyLPR($arguments);
        }elseif ($method === 'getDevices') {
            return self::getDevices($arguments);
        }else {
            throw new MethodException();
        }
    }
    private static function notifyLPR($arguments)
    {

        $compare_array = [
            "custId" => '',
            "lprUserId" => '',
            "deviceId" => '',
            "plate" => '',
            "state" => '',
            "make" => '',
            "model" => '',
            "body" => '',
            "location" => '',
            "lat" => '',
            "long" => '',
            "photo1" => '',
            "photo2" => '',
            "photo3" => '',
            "photo4" => '',
            "lprScanId" => '',
            "lprCameraId" => '',
            "color" => '',
            "permit" => '',
            "permitStatus" => '',
            "permitType" => '',
            "dutyGroup" => '',
            "comments" => '',
            "violationDesc" => '',
            "violationCode" => '',
            "violationId" => '',
            "status" => '',
            "firstChalkTime" => '',
            "lastSeen" => '',
            "zone" => ''];
        if(
            isset($arguments['LPRDetails']) &&
            empty(array_diff_key($arguments['LPRDetails'],$compare_array)) &&
            (count($arguments['LPRDetails']) == count($compare_array))
        ){
            return true;
        }else{
            throw new ArgumentException();
        }
    }

    private static function getDevices($arguments)
    {
        $returnObject = [
            ["device_id" =>"1079","device" =>"SM10"],
            ["device_id" =>"1092","device" =>"SM13"],
            ["device_id" =>"1093","device" =>"SM14"],
            ["device_id" =>"1094","device" =>"SM15"],
            ["device_id" =>"2796","device" =>"Vikash-S10"],
            ["device_id" =>"2820","device" =>"Rohit A30"],
            ["device_id" =>"2866","device" =>"Rohit A30"],
            ["device_id" =>"2876","device" =>null],
            ["device_id" =>"2886","device" =>null]
        ];
        if(isset($arguments['custId']) && is_array($arguments)){
            return $returnObject;
        }else{
            throw new ArgumentException();
            // return false;
        }
        
    }
}