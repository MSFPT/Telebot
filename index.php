<?php

  /*
   * https://github.com/MSFPT/Telebot
   */

  class Telebot {
    
    public $token;

    public function __construct($token=null){
      $this->token = $token;
    }

    public function Bot($method, $parameters){
      if(!$parameters){$parameters = array();}
      $parameters['method'] = $method;

      $url = "https://api.telegram.org/bot".$this->token."/";

      $request = curl_init(API);
      curl_setopt($request, CURLOPT_URL, $url);
      curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($request, CURLOPT_CONNETTIMEOUT, 7);
      curl_setopt($request, CURLOPT_TIMEOUT, 60);
      curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($parameters));
      curl_setopt($request, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

      $result = curl_exec($request);
      curl_close($request);
      return($result);
    }

  }

?>