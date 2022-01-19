<?php

require_once('../config.php');
require_once('../classes/SQLQuery.class.php');

$arrField = explode("=", $_SERVER["QUERY_STRING"]);
// echo "<br> " . $arrField[0] . " -- " . $arrField[1] . " -- Count: " . count($arrField)  . " -- " . json_encode($_REQUEST) ."<br>";

if (count($arrField) > 0 && $arrField[1] != "" ){
    $oSql         = new SQLQuery($db_host, $db_user, $db_password, $db_name, "zipcode");
    $zipcode_data = $oSql->select($arrField[1], $arrField[0]);
    //Access-Control-Allow-Origin header with wildcard.
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=utf-8');
    $result = array("message" => count($zipcode_data) > 0 ? "success" : "no results",  "data" => $zipcode_data);
    echo json_encode($result);
}else{
    echo "API Response :: Missing Parameters. Please enter a parameter. IE: /?id=90210";
}

?>