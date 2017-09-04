<?php
setlocale(LC_TIME, 'fr_FR', 'fra', 'french');
$tab_mois = array('JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUI', 'JUI', 'AOU', 'SEP', 'OCT', 'NOV', 'DEC');
$options = '';
foreach($tab_mois as $mois){
 $options .= '<option value="'.$mois.'">'.$mois.'</option>';
}
$options = str_replace('value="'.rtrim(strtoupper(strftime('%b')), '.').'"', 'value="'.rtrim(strtoupper(strftime('%b')), '.').'" selected="selected"', $options);
?>
<form method="post" action="traitement.php">
 <div>
  <select name="mois" id="mois">
   <?php echo $options; ?>
  </select>
 <div>
</form>