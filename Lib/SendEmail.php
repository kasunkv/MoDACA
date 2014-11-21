<?php
App:uses('CakeMail', 'Network/Email');

class SendEmail {
    
    public static function sendMail($to = null, $subject = null, $body = null) {
        $email = new CakeMail('gmailConfig');
        $email->to($to);
        $email->subject($subject);
        $email->from(array('noreply.modaca@gmail.com' => "MoDACA - Health Promotion Management System"));
        $email->sender('noreply,modaca@gmail.com', 'MoDACA - Health Promotion Management System');
        $email->send($body);
        
        return true;
    }
    
    
    
}