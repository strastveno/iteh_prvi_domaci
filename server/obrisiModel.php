<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("delete from model where id=".$_POST['id']." and marka=".$_POST['marka']);
$rezultat=$broker->getRezultat();
if(!$rezultat){
   echo $broker->getMysqli()->error;
}else{
    echo '1';
}


?> 