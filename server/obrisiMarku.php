<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("delete from marka where id=".$_POST['id']);
$rezultat=$broker->getRezultat();
if(!$rezultat){
   echo $broker->getMysqli()->error;
}else{
    echo '1';
}


?> 