<?php

 if ((getenv('REMOTE_ADDR') == '127.0.0.1')){
  $db_host     = "localhost";
  $db_name     = "avanti_phapi";
  $db_user     = "root";
  $db_password = "123456";
 }else{
  $db_host     = "localhost";
  $db_name     = "avanshfw_phapi";
  $db_user     = "avanshfw_phapi_root";
  $db_password = "P0w329@h0m35";
 }

  //Mail Settings
  $mail_from_name   = "Powering Homes";
  $mail_from_email  = "info@poweringhomes.com";

  // General Company Settings
  $company_name = "Powering Homes";
?>