<?php
$etudiants=array("Etudiant 1","Etudiant 2","Etudiant 3","Etudiant 4","Etudiant 5");
$notes=array($etudiants,$_POST);
echo "<table border='1' align='center'>";
echo "<tr>";
echo"<td>Clubs</td><td>Mon</td><td>Tues</td><td>Wed</td><td>Thur</td><td>Fri</td><td>Satu</td><td>Sun</td>" ;
echo"</tr>";
for ($nbr=0;$nbr<5;$nbr++)
{
echo "<tr>";
    for ($c=0;$c<2;$c++)
    {
        echo"<td>";
        echo $notes[$c][$nbr];
        echo"</td>";
    }
echo "</tr>";
}
echo "</tr>";
echo "</table>";
?>
