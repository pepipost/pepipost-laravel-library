<?php
namespace Pepipost\PepipostLib;
use Pepipost\PepipostLib\Exceptions;
class PepipostLib {
  public function sendMail($mailBody, $apiKey=null){
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