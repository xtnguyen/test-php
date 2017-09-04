<?php

require __DIR__.'/vendor/autoload.php';
require_once 'data-events-fb.php';


 use \Kreait\Firebase\Configuration;
 use \Kreait\Firebase\Firebase;
 use \Kreait\Ivory\HttpAdapter\Event\Subscriber\TapeRecorderSubscriber;
 use \Kreait\Firebase\Auth\TokenGenerator;



$firebaseSecret = 'AIzaSyAWpaRmVFiMYnk93Vo_RS3cRERrxD76SQ0';
 $baseUrl= 'https://kraze-935a0.firebaseio.com';

$config = new Configuration();
//$config->setFirebaseSecret($firebaseSecret);
$config->setAuthConfigFile('kraze-935a0.json');

$firebase = new Firebase($baseUrl, $config);

$clubs=$firebase->get('Clubs');

$events=$firebase->get('Events');



$a=0;
$b=0;
  
    while($a<count($events))
    {foreach($events as $event)

      { $long=count($event);
        while($b<$long) 
        {
          $nom_event=$firebase->get('Events/'.$a.'/'.$b.'/name');
          $nom_club=$firebase->get('Events/'.$a.'/'.$b.'/place/name');
          $debut=$firebase->get('Events/'.$a.'/'.$b.'/start_time');
          $fin=$firebase->get('Events/'.$a.'/'.$b.'/end_time');
          $D=date("D",strtotime($debut));
          $dayD=date("d/m/Y H:i",strtotime($debut));
          $dayF=date("d/m/Y H:i",strtotime($fin));
          
           if(strstr($D,"Sat"))
           {
            print_r("Nom évenement: ".$nom_event);echo "<br/>";
            print_r("Nom Club: ".$nom_club);echo "<br/>";
            print_r("Date Début: ".$dayD);echo "<br/>";
            print_r("Date Fin: ".$dayF);echo "<br/>";echo "<br/>";echo "<br/>";
            
           } 
          $b++;
        }
         echo"<br/>";
         echo"<br/>";
          echo"<br/>";
        $b=0;
        $a++;
      }
      
    }
   
 
  ?>
 
