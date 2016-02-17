
<!-- POST PAGE -->

<?php
include('config.php');
if(!isset($_GET['id']))
{
header('Location: index.php');
}
else
{
$id_get = intval($_GET['id']);
}

$v1 = mysql_query('SELECT * FROM articles WHERE id = "'.$id_get.'"');
$info_article = mysql_fetch_array($v1);
if(isset($info_article['id'])) { ?>
<h1><?php echo htmlspecialchars($info_article['titre']); ?></h1>
<h5>par <?php echo $info_article['auteur']; ?></h5>
<br />
<?php echo nl2br(htmlspecialchars($info_article['contenu']));?>
<br />
<br />
<hr />
<br />
<!-- Commentaires -->

<?php
$v2 = mysql_query('SELECT * FROM commentaires WHERE id_article ="'.$info_article['id'].'" ORDER BY id LIMIT 0,10');
while($info_com = mysql_fetch_array($v2)) { ?>
Commentaire N <?php echo $info_com['id'];?> par <?php echo $info_com['auteur'];?> : <br />
<?php echo nl2br(htmlspecialchars($info_com['contenu'])); ?><br /><br />
<?php
}
}
else
{
echo 'Erreur : News non existante';
}
?>
<br />




