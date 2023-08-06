<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("select * from model where marka=".$_GET['marka']);
$rezultat=$broker->getRezultat();
$response=[];
if(!$rezultat){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}else{
    $response['status']=1;
    while($red=$rezultat->fetch_object()){
        $response['modeli'][]=$red;
    }
}

echo json_encode($response);

?> 