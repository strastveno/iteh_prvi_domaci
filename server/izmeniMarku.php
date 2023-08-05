<?php

require 'broker.php';
$broker=Broker::getBroker();

$broker->izvrsiUpit("update marka set naziv='".$_POST['naziv']."', drzava=".$_POST['drzava']." where id=".$_POST['id']);
$rezultat=$broker->getRezultat();
if(!$rezultat){
   echo $broker->getMysqli()->error;

}else{

    echo '1';
}

?>