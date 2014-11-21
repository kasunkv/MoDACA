<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class PasswordGenerator {
    
    public static function getRandomPassword($num = 6) {
        // charset
        $charset = array();
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '12345678901234567890123456';
        $specialChars = '!@#$%^&*@&!@#$%^&*#%!@&*!?';
        
        // generate char arrays
        $lowerCase = str_split($lowerCase);
        $upperCase = str_split($upperCase);
        $numbers = str_split($numbers);
        $specialChars = str_split($specialChars);
        
        array_push($charset, $lowerCase, $upperCase, $numbers, $specialChars );
        
        $password = array();
        
        for ($i = 0; $i < $num; $i++) {
            $col = mt_rand(0, 3);
            $row = mt_rand(0, 25);
            
            array_push($password, $charset[$col][$row]);
        }
                
        return implode($password);
    }
    
    public static function hashPassword($password, $hashType = 'md5') {
        $passwordHasher = new SimplePasswordHasher(array('hashType' => $hashType));
        return $passwordHasher->hash($password);
    }
}