<?php

require 'broker.php';
$broker=Broker::getBroker();



$broker->izvrsiUpit("insert into marka(naziv,drzava) values ('".$_POST['naziv']."',".$_POST['drzava'].")");
$rezultat=$broker->getRezultat();
if(!$rezultat){
   echo $broker->getMysqli()->error;
}else{


    echo '1';
}

?> 