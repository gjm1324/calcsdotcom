<?php

class HttpRequest {
    
    /**
     * Executes a POST query on the specified URL. Post information should be put into the 
     * $dataArray parameter as an array in the form: array( 'key' => 'value' );
     * 'value' would be accessed at the $url using $_POST['key'] 
     */
    public static function post($dataArray, $url)
    {
        $postString = "";
        foreach ($dataArray as $key => $value)
        {
            $postString .= $key . '=' . $value . '&';
        }
        rtrim($postString, '&');
        
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, count($dataArray));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        
        $result = curl_exec($curl);
        
        curl_close($curl);
        
        return $result;
    }
    
    /**
     * Executes a GET query on the specified URL. 
     */
    public static function get($url)
    {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
        
        curl_close($curl);
        return $result;
    }

    public static function toString($url){
        return file_get_contents($url);
    }    
}

?>