<?php
// récupération de la date passée par GET
  $date_act=$HTTP_GET_VARS['date'];
  list($day, $month, $year) = explode("/", $date_act);
  $date_act2=$year."/".$month."/".$day;
  echo "<b>Activités du ". $date_act."</b></p>";

// on ouvre la base de donnée
  require('includes/start.php');
  $requete="SELECT * FROM activite where date_init<='$date_act2' AND date_fin>='$date_act2'";
  $valeur=mysql_query($requete);
  $ligne=mysql_num_rows($valeur);
  if ($ligne==0)
   {
    echo "<h2 align=\center\">Pas d'activités enregistrées à cette date";
   }else{
  while ($tableau=mysql_fetch_array($valeur))
  {
  $uid=$tableau['uid'];
  $titre=STRIPSLASHES($tableau['titre']);
  $date_init=STRIPSLASHES($tableau['date_init']);
  list ($year,$month,$day)=explode("-",$date_init);
  $date_init=$day."/".$month."/".$year;
  $date_fin=STRIPSLASHES($tableau['date_fin']);
  list ($year,$month,$day)=explode("-",$date_fin);
  $date_fin=$day."/".$month."/".$year;
  echo "Activité: ".$titre." ".$date_init.";
  if ($date_init<>$date_fin)
  {
  echo " au <b>".$date_fin."</b>";
  }
  echo "<br>";
}
}

// on ferme la base de donne
include('includes/stop.php');

?>