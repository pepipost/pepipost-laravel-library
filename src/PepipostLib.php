<?php
namespace Pepipost\PepipostLib;
use Pepipost\PepipostLib\Exceptions;
/**
 * Pepipost\PepipostLib libarary class
 */
class PepipostLib {
  public function sendMail($mailBody, $apiKey=null){
    $client = new PepipostClient($apiKey);
    $sendController = $client->getMailSend();
  
    try {
      $result = $sendController->createGenerateTheMailSendRequest($mailBody);
      return $result;
    } catch (Exception $e) {
      return $e->getMessage;
    }
  }
}