<?php
    $coworkers = array("Ken","Alice","Judy","BOSS","Bob");
    foreach($coworkers as $coworker){
      if($coworker == "BOSS"){
        echo 'Good morning' . $coworker . '<br>';
      }else{
        echo 'Hi' . $coworker . "<br>";
      }
    }
?>
      