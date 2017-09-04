<?php
require __DIR__.'/vendor/autoload.php';
require_once 'data-events-fb.php';

//require __DIR__.'C:\wamp2\www\test-events\Firebasephp.php';
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


  $RESULT=getClubsFromFacebook();



   $firebase->set($RESULT, 'Events');
   
   
  //echo 'ok';
//  print_r($firebase->get('Events'));
?>