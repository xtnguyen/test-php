<?php
require_once __DIR__. '/vendor/autoload.php';
require_once '/httpful.phar';

define('FB_API_GRAPH_URL', 'https://graph.facebook.com');


function getClubsFromFacebook(){
$i=0;
$tableau = array();

$tab = array('122949944389260','499401423506543','45013643000','816507451758408','1440884839498361','268074226665312','474385146095190','44309696400','88200628120','902006973196538','239978649487234','53572490510','181991191881675','125893390797852','106149749438924','43304410635','1623869817640917','160796500606383' ,'1587897388193158');
$date = new DateTime("now"); 
$tz = new DateTimeZone('Europe/Paris');
$date->setTimezone($tz);

$access_token='EAACEdEose0cBABp0ffBgUPHDiOTfWTaTPy896QsNNOPCgCHZCU20TH4OU8lKwcpKHJaxB0OPF3fUVOnlM3frnZAZAkfkuvGwwwuzo74wtHcRW3PZAZC2LZC3W6sUBw0ty7e2bSXvqqAZAlmpqlwZCU9o4ZBV6XyEc8OwZBeFZAeHDoBmTAh0kAORBGOXvYNTmck6vsZD';


while($i<count($tab))
{   
    $url = FB_API_GRAPH_URL.'/'.$tab[$i].'/events?access_token='.$access_token.'&format=json';

    $response = \Httpful\Request::get($url)->send();
    if (isset($response->body->data)) 
    {
        $datas = $response->body->data;
            $tabFormatted = array();
            foreach($datas as $data){
                if($data->start_time >= $date->format(DateTime::ISO8601))
               {
                    $tabFormatted[] = $data;
                   
               }
               else { $datas=null;}
            }

            
              $res=json_encode($tabFormatted);
              $tableau[] = json_decode($res);
            
            

                  
          
           
         }

         $i++;}

         for($j=0;$j<count($tableau);$j++)
       {
            $Firebase[] = array_reverse($tableau[$j]);
         
       }

      return $Firebase;
}










