<?php

include 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("select ma.*, d.naziv as 'drzava_naziv', count(m.id) as 'broj_modela' from marka ma inner join drzava d on (ma.drzava=d.id) left join model m on (ma.id=m.marka) group by ma.id ");
$rezultat=$broker->getRezultat();
$response=[];
if(!$rezultat){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
}else{

    $response['status']=1;
    while($red=$rezultat->fetch_object()){
        $response['marke'][]=$red;
    }
}
echo json_encode($response);

?>