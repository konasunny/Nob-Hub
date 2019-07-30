		
		<?php
		$row['receivedtime']='2019-05-03 05:20:58 PM';
		$_GET['timezone']='America/Mexico_City';
		$info['timezone']='Asia/Calcutta';
		 echo  ConvertTimezoneToAnotherTimezone($row['receivedtime'],$_GET['timezone'],$info['timezone']);
		function ConvertTimezoneToAnotherTimezone($time, $currentTimezone, $timezoneRequired) {
    $dayLightFlag = false;
    $dayLgtSecCurrent = $dayLgtSecReq = 0;
    $system_timezone = date_default_timezone_get();
    $local_timezone = $currentTimezone;
    date_default_timezone_set($local_timezone);
    $local = date("Y-m-d H:i:s");
    /* Uncomment if daylight is required */
    //        $daylight_flag = date("I", strtotime($time));
    //        if ($daylight_flag == 1) {
    //            $dayLightFlag = true;
    //            $dayLgtSecCurrent = -3600;
    //        }
    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s ");

    $require_timezone = $timezoneRequired;
    date_default_timezone_set($require_timezone);
    $required = date("Y-m-d H:i:s ");
    /* Uncomment if daylight is required */
    //        $daylight_flag = date("I", strtotime($time));
    //        if ($daylight_flag == 1) {
    //            $dayLightFlag = true;
    //            $dayLgtSecReq = +3600;
    //        }

    date_default_timezone_set($system_timezone);

    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);

    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    if ($dayLightFlag) {
        $final_diff = $dayLgtSecCurrent + $dayLgtSecReq;
        $date->modify("$final_diff seconds");
    }

    $timestamp = $date->format("Y-m-d H:i");

    return $timestamp;
} 
?>