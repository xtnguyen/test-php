<?php
require_once __DIR__. '/vendor/autoload.php';
require_once '/httpful.phar';


// vars
define('FB_API_GRAPH_URL', 'https://graph.facebook.com');
define('FB_API_ID', '106151373383216');
define('FB_API_SECRET', '547f926a31fc98f871a5fa2419070fc5');
define('FB_PAGE_ID', '');

function getClubsFromFacebook(){
$i=0;
$tableau = array();
// Construction de l'URL à appeler pour récupérer une APP access_token
$tab = array('122949944389260','499401423506543','45013643000','816507451758408','1440884839498361','268074226665312','474385146095190','44309696400','88200628120','902006973196538','239978649487234','53572490510','181991191881675','125893390797852','106149749438924','43304410635','1623869817640917','160796500606383' ,'1587897388193158');
$url = FB_API_GRAPH_URL.'/oauth/access_token?client_id='.FB_API_ID.'&client_secret='.FB_API_SECRET.'&grant_type=client_credentials';
// Appel à l'API
//$url=https://graph.facebook.com/$tab[$i]/events?access_token=(token)
$response = \Httpful\Request::get($url)->parseWith(function($body) {
    $json_body = json_decode($body, true);
    $access_token = $json_body['access_token'];
    //$access_token = str_replace("access_token=", "", $body); // on parse au préalable le résultat récupéré qui est sous la forme "access_token=<access_token>"
    return $access_token;
})->send();

//$access_token='EAACEdEose0cBABp0ffBgUPHDiOTfWTaTPy896QsNNOPCgCHZCU20TH4OU8lKwcpKHJaxB0OPF3fUVOnlM3frnZAZAkfkuvGwwwuzo74wtHcRW3PZAZC2LZC3W6sUBw0ty7e2bSXvqqAZAlmpqlwZCU9o4ZBV6XyEc8OwZBeFZAeHDoBmTAh0kAORBGOXvYNTmck6vsZD';
$date = new DateTime("now"); 
$tz = new DateTimeZone('Europe/Paris');
$date->setTimezone($tz);



// Si on récupère quelque chose
if (isset($response->body) && !empty($response->body)) {
    $access_token = $response->body;
    

    while($i<count($tab))
       {if (!empty($access_token)) {
        // Construction de l'URL à appeler pour récupérer les évènements de la page
        
        $url = FB_API_GRAPH_URL.'/'.$tab[$i].'/events?access_token='.$access_token.'&format=json';
        // Appel à l'API
        
        $response = \Httpful\Request::get($url)->send();
        // si data existe, c'est un array() qui contient tous les évènements relatifs à cette page
        if (isset($response->body->data)) {
            // affichage des données récupérées
            
            
            $datas = $response->body->data;
            $tabFormatted = array();
            foreach($datas as $data){
                if($data->start_time >= $date->format(DateTime::ISO8601))
               {
                    $tabFormatted[] = $data;
                   
               }
               else { $datas=null;}
               unset($data->description);
            }

            
              $res=json_encode($tabFormatted);
              $tableau[] = json_decode($res);
            
            

                  
          
           
         }
    } 
       
    $i++;}

           
            
       for($j=0;$j<count($tableau);$j++)
       {
            $Firebase[] = array_reverse($tableau[$j]);
         
       }
    
      return $Firebase;
        // file_put_contents('C:\wamp64\www\test-events\Untitled-1.json',json_encode($Firebase));
     
    //else {
        return null;
        
    echo "NOPE";
    echo "\r\n";
}
}
?>