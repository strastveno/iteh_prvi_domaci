<?php

include 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("select * from marka where id=".$_GET['id']);
$rezultat=$broker->getRezultat();
$response=[];
if(!$rezultat){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}else{

    $response['status']=1;
    $response['marka']=$rezultat->fetch_object();

}
echo json_encode($response);

?> 