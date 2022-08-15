<?php
namespace Pepipost\PepipostLib;
use Pepipost\PepipostLib\Exceptions;
class Pepipostmailer {
  public function sendMail($mailBody, $apiKey=null){
    // $apiKey = 'e8a874fbd6f35ffc5fddd32ef0879205';

    $client = new PepipostClient($apiKey);
    $sendController = $client->getMailSend();
  
    try {
      $result = $sendController->createGenerateTheMailSendRequest($mailBody);
      return $result;
    } catch (Pepipost\PepipostLib\APIException $e) {
      return $e->getMessage;
    }
  }
}