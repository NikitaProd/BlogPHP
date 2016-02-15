

<?php
// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
?>

<!-- Blog basique  -->

<?php
include('config.php');
// mysql_connect('localhost', 'root', 'root')*
// mysql_select_db('blog1');

// phpmyadmin:  table: 1.Articles (id, titre, auteur, contenu)  et
//                     2.commentaire (id, auteur, contenu, id_article )
?>

<h1>Nouveautes : </h1>

<?php
$v1 = mysql_query('SELECT * FROM articles ORDER BY id DESC LIMIT 0,5');
while($info_article = mysql_fetch_array($v1)) {
?>
Nouveaute N <?php echo $info_article['id']; ?> publie par
<?php echo $info_article['auteur']; ?> :
<i><a href="post.php?id=<?php echo $info_article['id'];?>">
<?php echo htmlspecialchars($info_article['titre']); ?></a></i><br /><br />
<?php echo nl2br(htmlspecialchars($info_article['contenu'])); ?><br />
<hr />

<?php
}
?>

<!-- Blog basique THE END -->
