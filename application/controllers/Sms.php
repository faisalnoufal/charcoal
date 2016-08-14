<?php

class Sms extends Core_Controller {

    function __construct() {
        parent::__construct();
    }


    public function buildMessageXml($recipient, $message) {
        $xml = new SimpleXMLElement('<MESSAGES/>');

        $authentication = $xml->addChild('AUTHENTICATION');
        $authentication->addChild('PRODUCTTOKEN', 'e8dd5ec7-c733-48f2-8a4b-9b77f36a169c');

        $msg = $xml->addChild('MSG');
        $msg->addChild('FROM', 'Ajoul');
        $msg->addChild('TO', $recipient);
        $msg->addChild('BODY', $message);

        return $xml->asXML();
    }

    public function sendMessage($recipient = '+919744298805', $message = 'test mesage') {
        $xml = $this->buildMessageXml($recipient, $message);

        $ch = curl_init(); // cURL v7.18.1+ and OpenSSL 0.9.8j+ are required
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'https://sgw01.cm.nl/gateway.ashx',
            CURLOPT_HTTPHEADER => array('Content-Type: application/xml'),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $xml,
            CURLOPT_RETURNTRANSFER => true
                )
        );

        $response = curl_exec($ch);

        curl_close($ch);
        if ($response == '') {
            echo 'message sended successfully';
        } else {
            echo $response;
        }
    }

}
