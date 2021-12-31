<?php
// Mail Class
// Adrian Gerig (c) May,16th 2021

class Mail {
    function send($mailFromName, $mailFromEmail, $mailToName, $mailToEmail, $mailSubject = 'Mail Subject', $mailMsg = 'This is the mail message', $mailCc = '', $mailBcc = ''){
        $to      = $mailToName . ' <' . $mailToEmail . '>';
        $from    = $mailFromName . ' <' . $mailFromEmail . '>';
        $subject = $mailSubject;
        $message = $mailMsg;
        $cc      = ($mailCc !== "") ? 'Cc: ' . $mailCc . "\r\n" : "";
        $bcc     = ($mailBcc !== "") ? 'Bcc: ' . $mailBcc . "\r\n" : "";
        $headers =  'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
                    'From: ' . $from . "\r\n" .
                    $cc .
                    $bcc .
                    'Reply-To: ' . $from . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        // We mail it
        $mailResult = mail($to, $subject, $message, $headers);
        return $mailResult;
    }
}
?>