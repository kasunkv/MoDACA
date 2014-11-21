<?php
App::uses('CakeEmail', 'Network/Email');

class SendEmail {
    
    public static function sendMail($to = null, $subject = null, $body = null) {
        $email = new CakeEmail('gmailConfig');
        $email->template('default');
        $email->viewVars(array('message' => $body));
        $email->viewVars(array('title' => $subject));
        $email->emailFormat('html');
        $email->to($to);
        $email->subject($subject);
        $email->from(array('noreply.modaca@gmail.com' => "MoDACA - Health Promotion Management System"));
        $email->sender('noreply.modaca@gmail.com', 'MoDACA - Health Promotion Management System');
        $email->send();
        
        return true;
    }
    
    
    
}