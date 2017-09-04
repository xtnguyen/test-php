<?php
session_start();
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

$i=1;


echo "<table border='1' align='center'>";

echo "<tr>";
echo"<td>Clubs</td> <td>Mon</td> <td>Tues</td> <td>Wed</td> <td>Thur</td> <td>Fri</td> <td>Satu</td> <td>Sun</td>" ;
while($i<count($clubs))
{   $clubname=$firebase->get('Clubs/'.$i.'/Name');
    
    echo "<tr>";
    
     echo "<td>";
     print_r($clubname);
      echo "</td>";

    echo "<td>";
        if(strstr($clubname,"Rex"))
        {
           echo"<form action='monrex.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                   </form> "; 
        }
        
             
        
     
    echo "</td>";

    echo "<td>";
        if(strstr($clubname, "Rex"))
        {
            echo"<form action='tuesrex.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                   </form> "; 
             
        }
           
           

    echo "</td>";

    echo "<td>";
            
              echo"<form action='wed.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                   </form> "; 
             
            


    echo "</td>";
    
    echo "<td>";
         
          echo"<form action='thur.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                   </form> "; 
             

    echo "</td>";

    echo "<td>";
            
            echo"<form action='frid.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                   </form> "; 
             
     
    echo "</td>";

    echo "<td>";
    if(strstr($clubname,"Rex"))
    {
        echo"<form action='saturex.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                   </form> ";
    }
         
             
        
    echo "</td>";

    echo "<td>";

        echo"<form action='sund.php' method='POST' TARGET='_BLANK'>
                       <input type='submit' name='' value=''> 
                  </form> ";
    echo "</td>";

     
    echo "</tr>";
    
  $i++;
}
echo "</tr>";
echo "</table>";


?>