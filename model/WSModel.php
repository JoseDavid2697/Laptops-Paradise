
<?php

class WSModel
{
    public function requestAccessCode()
    {
        //Send a GET request to the WS in order to get a new access code 
        $opts = array(
            'http' =>
            array(
                'method'  => 'GET',
                'header'  => 'Content-Type: application/x-www-form-urlencoded'
            )
        );
        $context  = stream_context_create($opts);
        // session_start();

        $result = file_get_contents('http://localhost:56719/api/values/requestAccessCode/', false, $context);
        $accessCode = json_decode($result, true);
        return $accessCode;
    }

    
}
