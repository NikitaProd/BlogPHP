<!-- Espace d'administration de blog -->


<?php
include('config.php');

// Suppression
if(isset($_GET['delete']) AND isset($_GET['id'])) {
$idP = intval($_GET['id']);
mysql_query('DELETE FROM articles WHERE id = "'.$idP.'"');
}
?>

<!-- Administration -->

<h1>Ajouter une news</h1>
<?php
if(isset($_POST['envoi'])) {
if(isset($_POST['auteur']) AND !empty($_POST['auteur'])
AND isset($_POST['titre']) AND !empty($_POST['titre'])
AND isset($_POST['contenue']) AND !empty($_POST['contenue']))
{
$auteurS = mysql_escape_string($_POST['auteur']);
$titreS = mysql_escape_string($_POST['titre']);
$contenueS = mysql_escape_string($_POST['contenue']);

mysql_query('INSERT INTO articles
VALUES("","'.$titreS.'", "'.$auteurS.'","'.$contenueS.'")')
or die(mysql_error());
echo 'News publiee !';
}
else
{
echo 'Tout les champs sont obligatoires';
}
}
?>


<!-- FORME -->

<br />
<form action="" method="post">
Auteur : <input type="text" name="auteur" value="GO"/><br />
Titre : <input type="text" name="titre"/><br />
Contenue : <textarea name="contenue"></textarea><br />
<input type="submit" name="envoi" value="Go !" />
</form>
<br />

<hr />
<br />
<h3>Liste des news</h3><br />
<?php
$v1 = mysql_query('SELECT id, titre FROM articles ORDER BY id DESC LIMIT 0,5');
while($info_art = mysql_fetch_array($v1)) {
?>
<?php echo htmlspecialchars($info_art['titre']); ?>
<a href="?delete&id=<?php echo $info_art['id']; ?>"><img src="delete.png"/></a><br />

<?php
}
?>
