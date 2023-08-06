<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("insert into model(marka,naziv,tip,velicina) values
 (".$_POST['marka'].",'".$_POST['naziv']."','".$_POST['tip']."','".$_POST['velicina']."')");
$rezultat=$broker->getRezultat();
if(!$rezultat){
   echo $broker->getMysqli()->error;
}else{


    echo '1';
}

?> 