<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("update model set naziv='".$_POST['naziv']."', tip='".$_POST['tip']."',
  velicina='".$_POST['velicina']."' where id=".$_POST['id']." and marka=".$_POST['marka']);
$rezultat=$broker->getRezultat();
if(!$rezultat){
   echo $broker->getMysqli()->error;
}else{
    echo '1';
}

?> 