<?php


function enviarMsg($msg,$numero){
    
    
    
    $username = "teste_recrutamento";
    $senha = "jH09stM9";


    $criptografada = base64_encode($username.$senha); //É necessario a classe HttpRequest.
    
    $request = new HttpRequest('https://api.infobip.com/sms/1/text/single', HttpRequest::HTTP_METH_POST);
    //$request->setUrl('https://api.infobip.com/sms/1/text/single');
    //$request->setMethod(HTTP_METH_POST);

    $request->setHeaders(array(
      'accept' => 'application/json',
      'content-type' => 'application/json',
      'authorization' => 'Basic '.$$criptografada.''
    ));

    $request->setBody('{  
       "from":"InfoSMS",
       "to":'."$numero".',
       "text":'."$msg".'
    }');

    try {
      $response = $request->send();

      echo $response->getBody();
    } catch (HttpException $ex) {
      echo $ex;
    }
    
}




?>