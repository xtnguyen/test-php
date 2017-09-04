
<?php
require __DIR__.'/vendor/autoload.php';
require_once 'firebase_php_sdk.php';

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

$datas = $firebase->get('Events');

   $date = new DateTime("now"); 
$tz = new DateTimeZone('Europe/Paris');
$date->setTimezone($tz);


    


?>
<!DOCTYPE html>
 <head>
    <title> Software Event </title>
    <style type="text/css">
      body {  color:black;
              font-family: 'calibri';
              font-size: 16px;
           }
     .button_vert{background-color: green;
             border-color: #BCB6E2 #BCB6E2 #A8A2CC #A8A2CC;  
             border-top-width: thin;  
             border-right-width: thin;  
             border-bottom-width: thin;  
             border-left-width: thin;
             border-radius: 50%;  }
    .button_rouge{background-color: red;
             border-color: red red red red red;  
             border-top-width: thin;  
             border-right-width: thin;  
             border-bottom-width: thin;  
             border-left-width: thin;
             border-radius: 50%; }
    #id1{    float : right;
             margin-right: 60px;}
    #id2{    float : left;
             margin-left: 60px;}
             
    </style>
</head> 
<body>


    <figure>
      <img  align="left" width="200px" height="200px" src="Logo_png_degrade.png"/>
    </figure>
    



    <br/>
    <br/>
    <div align="center">
    

  <?php
/**
 * Construction de la liste de choix du mois
 *
 * @param   Int     $current_month  Mois courant
 * @param   Int     $current_year   Année courante
 * @param   Array   $month          Liste des mois en français
 * @param   String  $sSelect        Code HTML d'une balise SELECT
 * @param   String  $sOption        Code HTML d'une balise OPTION
 * @param   Int     $selectedDate   Mois récupéré en POST_DATA
 * @return  String  Code complet de la liste de sélection.
 */
function SelectMois($current_month, $current_year, $month, $sSelect, $sOption, $selectedDate = null)
{
  $m = $current_month;
   $y = $current_year;
    $options = sprintf($sOption, '-1', $month[(int)$m] ." - ". $y);
    for($i = 0, $m = $current_month, $y = $current_year; $i < 12; $i++, $m++)
    {
        if($m > 12)
        {
            $m = 1;
            $y++;
        }
        $value = sprintf("%02d",$m) .''. $current_year;
        if(!is_null($selectedDate) && $selectedDate == $value)
        {
            $value .= '" selected="selected';
        }
        $label = $month[(int)$m] ." - ". $y;
        $options .= sprintf($sOption, $value, $label);
    }
    $select = sprintf($sSelect, $options);
    return $select;
}
$month = array(
     1 => 'Janvier',
     2 => 'Février',
     3 => 'Mars',
     4 => 'Avril',
     5 => 'Mai',
     6 => 'Juin',
     7 => 'Juillet',
     8 => 'Août',
     9=> 'Septembre',
    10=> 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
);
/**
 * Code du formulaire
 */
$sForm = <<<CODE_HTML
<form action="{$_SERVER['PHP_SELF']}" method="post" name="monform" id="monform">
  <p>
%s  </p>
</form>
CODE_HTML;
/**
 * Code de la liste de sélection
 */
$sSelect = <<<CODE_HTML
    <select name="date" id="date" size="1" style="width:200px;" onchange="document.forms['monform'].submit();">
%s    </select>
CODE_HTML;
/**
 * Code pour une option de sélection
 */
$sOption = <<<CODE_HTML
      <option value="%s">%s</option>
CODE_HTML;
$selectedDate = isset($_POST['date']) ? $_POST['date'] : null;
// Recherche de la date du jour
$current_month = date('m');
$current_year  = date('Y');
$listeChoix = SelectMois($current_month, $current_year, $month, $sSelect, $sOption, $selectedDate);
$formulaire = sprintf($sForm, $listeChoix);
echo($formulaire);
?>
 </div><br/><br/>

      <TABLE border='l' align="center" width="75% " height="100%" >
       
        <tr> 
            <th> Clubs</th>
            <th> Lundi </th>
            <th> Mardi </th>
            <th> Mercredi </th>
            <th> Jeudi </th>
            <th> Vendredi </th>
            <th> Samedi </th>
            <th> Dimanche </th>
        </tr>

        <tr>
            <th> Rex </th>
            <th> 
               
                <form action="test.php" method="POST" TARGET="_BLANK"> 
               <input type="submit" name="" value="" class="button_vert"> 
                  </form> 

            </th>
            <th>  

               <form action="test.php" method="POST" TARGET="_BLANK"> 
               <input type="submit" name="" value="" class="button_vert"> 
                  </form>
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event rex ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event rex ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
            </th>
        </tr>
        <tr>
            <th> Folie's Pigalle  </th>
            <th>  
            </th>
            <th> 
                <!--<input type="button" value="prompt" onClick="prompt('Entrez votre nom', 'Votre nom');" /> -->
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event Folie's Pigalle ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th> 
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form> 
            </th>
        </tr>
        <tr>
            <th> Globo</th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
           
        </tr>
        <tr>
            <th> Garage </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            
        </tr>
        <tr>
            <th> FAUST </th>
            <th>  
            </th>
            <th>  
            </th>
            <th> 
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
            </th>
        </tr>
        <tr>
            <th> Bus Palladium </th>
            <th> 
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
        </tr>
        <tr>
            <th> L'Officine 2.0 </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
        </tr>
        <tr>
            <th> Djoon </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
        </tr>
        <tr>
            <th> Java </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
        </tr>
        <tr>
            <th> Gibus Club </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
        </tr>
        <tr>
            <th> Badaboum</th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
        </tr>
        <tr>
            <th> Nouveau Casino</th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  
            </th>
            <th>  <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
            </th>
        </tr>
        <tr>
            <th> Concrete </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event conrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event conrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form>
            </th>
            <th> 
                <script type="text/javascript">
                function afficher() {

                   alert("event conrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event conrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event conrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event concrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form>
            </th>
             <th>  
                 <script type="text/javascript">
                function afficher() {

                   alert("event conrète ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_rouge">
                </form> 
            </th>
                    
        </tr>
        <tr>
            <th> Batofar </th>
             <th>  
            </th>
             <th>  
            </th>
            <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
        </tr>
        <tr>
            <th> Machine du Moulin Rouge </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
    
             <th>  
                 <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
            <th>  
                <script type="text/javascript">
                function afficher() {

                   alert("event ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
        </tr>
        <tr>
            <th> Glazart </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
            <th>  
            </th>
             <th>  
            </th>
             <th>  
                 <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
             <th>  
                 <script type="text/javascript">
                function afficher() {

                   alert("event  ");
                     
                
                                  }
                </script>
                <form >
                   <input type="submit" name=" " value=" " onclick="afficher();" class="button_vert">
                </form>
            </th>
        </tr>
        <tr>
            <th> Communion (ex Nüba) </th>
             <th>  
            </th>
             <th>  
            </th>
            <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
        </tr>
        <tr>
            <th> Café Barge </th>
             <th>  
            </th>
             <th>  
            </th>
            <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
        </tr>
        <tr>
            <th> Nuits Fauves</th>
             <th>  
            </th>
            <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
             <th>  
            </th>
            <th>  
            </th>
             
        </tr>


    </TABLE>


  <!--
    <br/> <br/><br/><br/><br/><br/>
    
   <div id= "id1" >
    <form align="left">


      <span style="text-decoration: underline;"> Remplir les coordonnees des Clubs: </span> <br/><br/>
    
      <label for="adresse">  Address: </label>      <input type="text" id="adresse" /> <br/><br/>
      <label for="contact">  Contact: </label>      <input type="contact" id="contact"/> <br/><br/>
      <label for="Facebook ID">Facebook ID: </label> <input type="Facebook ID" id="Facebook ID"/> <br/><br/>
      <label for="Latitude">  Latitude: </label>     <input type="Latitude" id="Latitude"/>  <br/><br/>
      <label for="Longitude"> Longitude: </label>    <input type="Longitude" id="Longitude"/>  <br/><br/>
      <label for="Name">     Name: </label>          <input type="Name" id="Name"/>  <br/><br/>
      <label for="Price">    Price: </label>         <input type="Price" id="Price"/>  <br/><br/>

      <input type="submit" value="Valider" /> &nbsp;&nbsp;&nbsp;
      <input type="reset" value="Annuler" />
    </form>
    </div>

    <div id="id2" >

   <form align="right">
    <span style="text-decoration: underline;">Remplir les Events de et Nommer le Club: </span><br/><br/>
    <dl>
       <dt>
        <label for="Name de l'Event"> Name of Event: </label> <input type="text" id="nom_event"/> <br/><br/>
       </dt>
       <dt>
         <label for="Name_Club"> Name du Club:</label> <input type="name_club" id="name_club"/> <br/><br/>
       </dt>
       <dt>
         <lable for="Location"> Location:</label> <input type="Location" id="location"/> <br/><br/>
       </dt>
            <dd>
              City:<select>
                     <option selected="selected"> Paris </option>
                   </select>
            </dd>
            <dd>
              Country:<select>
                         <option selected="selected"> France <option>
                      </select>
            </dd>
            <dd>
                <label for="Latitude"> Latitude:</label> <input type="Latitude" id="Latitude"/> <br/><br/>
            </dd>
            <dd>
                <label for="Longitude"> Longitude:</label> <input type="Longitude" id="Longitude"/> <br/><br/>
            </dd>
            <dd>
                <label for="Street"> Street:</label> <input type="Street" id="Street"/> <br/><br/>
            </dd>
            <dd>
                <label for="ZIP"> Zip:</label> <input type="zip" id="zip"/> <br/><br/> 
            </dd>
        <dt>
            <label for="Start_Time"> Start Time:</label> <input type="start_time" id="start_time"/> <br/><br/>
        </dt>
        <dt>
            <label for="End_Time"> End Time:</label> <input type="end_time" id="end_time"/> <br/><br/>
        </dt>


    </dl>
       <input type="submit" value="Ajouter" /> &nbsp;&nbsp;&nbsp;
      <input type="reset" value="Annuler" />
   </form>
   </div>
</body>-->
    </html>
    /*
$date = new DateTime("now"); 
$tz = new DateTimeZone('Europe/Paris');
$date->setTimezone($tz);
echo $date->format(DateTime::ISO8601)."\n";

//echo $date->format('D')."\n";
$datejour = date('D');
echo $datejour;
echo "\r\n";

 if( strstr($debut,"Thu"))
 {echo" YES";}
 else echo"no";
 echo "<br/>";
*/