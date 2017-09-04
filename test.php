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
          //$nom_event=$firebase->get('Events/'.$a.'/'.$b.'/name');
          $clubevent=$firebase->get('Events/'.$a.'/'.$b);
          $nom_club=$firebase->get('Events/'.$a.'/'.$b.'/place/name');
          $_SESSION['var'] =$nom_club;
          $debut=$firebase->get('Events/'.$a.'/'.$b.'/start_time');
          //$fin=$firebase->get('Events/'.$a.'/'.$b.'/end_time');
          $D=date("D",strtotime($debut));
          //$dayD=date("d/m/Y H:i",strtotime($debut));
          
          
           if((strstr($D,"Sat")) && (strstr($nom_club,"Rex")))
           {
             print_r($clubevent);
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
 
