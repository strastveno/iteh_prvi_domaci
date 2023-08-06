<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("select m.*, mar.naziv as 'marka_naziv' from model m inner join marka mar on (m.marka=mar.id)");
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