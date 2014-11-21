<?php
App::uses('CakeEmail', 'Network/Email');

class SendEmail {
    
    public static function sendMail($to = null, $subject = null, $fields = array(), $template) {
        $email = new CakeEmail('gmailConfig');
        $email->template($template);
        $email = self::populateEmailBody($email, $fields);
        $email->emailFormat('html');
        $email->to($to);
        $email->subject($subject);
        $email->from(array('noreply.modaca@gmail.com' => "MoDACA - Health Promotion Management System"));
        $email->sender('noreply.modaca@gmail.com', 'MoDACA - Health Promotion Management System');
        $email->send();
        
        return true;
    }
    
    private static function populateEmailBody($email, $fields = array()) {
        if ($email != null && !empty($fields)) {
            foreach ($fields as $key => $value) {
                $email->viewVars(array($key => $value));
            }
            return $email;
        }
    }
    
    
}