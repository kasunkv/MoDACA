<?php

class RestHelper {
    
    public static function createResponseMessage($status, $data) {
        $response = array();
        $response['status'] = $status;
        $response['data'] = $data;
        return $response;
    }
    
        
}
