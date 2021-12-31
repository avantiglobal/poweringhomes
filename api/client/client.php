<?php

require_once('../config.php');
require_once('../classes/SQLQuery.class.php');
require_once('../classes/mail.class.php');

$arrField = explode("=", $_SERVER["QUERY_STRING"]);
// echo "<br> " . $arrField[0] . " -- " . $arrField[1] . " -- Count: " . count($arrField)  . " ::: " . json_encode(array_keys($_GET)) . " ||| " . json_encode(array_values($_GET)) ."<br>";

if (count($arrField) > 0 && $arrField[1] != "" ){
    $oSql        = new SQLQuery($db_host, $db_user, $db_password, $db_name, "client");
    $oMail       = new Mail();
    $client_data = $oSql->add(array_keys($_GET), array_values($_GET));
    // echo json_encode($_GET);
    // Mail to client
    $toName      = $_GET['firstname'].' '.$_GET['lastname'];
    $toEmail     = $_GET['email'];
    $fromName    = $mail_from_name; // from config.php
    $fromEmail   = $mail_from_email; // from config.php
    $Bcc         = 'adriangerig@gmail.com';
    $mailSubject = "Powering Homes - Mail confirmation";
    $unit        = ($_GET['unit'] == '') ? '' :  ', ' . $_GET['unit'];
    $mailMessage = '<h1>Powering Homes</h1>' .
                    '<h2>Confirmation Details</h2>' .
                    '<p><strong>Name:</strong> ' . $toName . '</p>' .
                    '<p><strong>Email:</strong> ' . $toEmail . '</p>' .
                    '<p><strong>Address:</strong> ' . $_GET['streetaddress'] . $unit . ', ' . $_GET['city'] . ', ' . $_GET['state'] . ', ' . $_GET['zipcode'] . '.</p>' .
                    '<p><strong>Phone: </strong>' . $_GET['phone'] . '</p>' .
                    '<h3>Electricity Amount: ' . $_GET['electricityamount'] . '</h3>' .
                    '<p>--</p>' .
                    '<p><small>' . $company_name . ', ' . date('Y') . '.</small></p>' .
                    '<p><small>Click <a href="#">here</a> to unsubscribe</small></p>' ;
    $oMail->send($fromName, $fromEmail, $toName, $toEmail, $mailSubject, $mailMessage, null, $Bcc);
    echo '///';
    echo "End Client";
}else{
    echo "API Response :: Missing Parameters. Please enter a parameter. IE: /?id=90210";
}

?>