<?php
/*
-> name komicho\firebase
-> author komicho
-> version  1.0
-> github https://github.com/komicho/firebase
*/

namespace komicho;

class firebase
{
    /*
    -> $key
    -> Describe: api access key from account firebase
    */
    public function __construct ($key)
    {
        $this->api_access_key = $key;
    }
    
    /*
    -> $to
    -> Describe: set device token id 
    */
    public function to ($to)
    {
        $this->arrPush['to'] = $to;
        return $this;
    }
    
    /*
    -> $notification
    -> Describe: set array notification
    -> Example: [
            'title' => 'kom',
            'body' => 'komicho :)'
        ]
    */
    public function notification ($notification)
    {
        $this->arrPush['notification'] = $notification;
        return $this;
    }
    
    /*
    -> $data
    -> Describe: set array data
    -> Example: [
            'title' => 'kom',
            'body' => 'komicho :)'
        ]
    */
    public function data ($data)
    {
        $this->arrPush['data'] = $data;
        return $this;
    }
    
    /*
    -> Describe: send notification
    */
    public function send ()
    {
        $headers = [
            'Authorization: key=' . $this->api_access_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $this->arrPush ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }
}