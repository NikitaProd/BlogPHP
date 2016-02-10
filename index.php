

<?php
include('config.php');

// mysql_connect('localhost', 'root', 'root')*
// mysql_select_db('blog1');

// phpmyadmin:  table: 1.Articles (id, titre, auteur, contenu)  et
//                     2.commentaire (id, auteur, contenu, id_article )
?>


<?php
include('config.php');

// mysql_connect('localhost', 'root', 'root')*
// mysql_select_db('blog1');

// phpmyadmin:  table: 1.Articles (id, titre, auteur, contenu)  et
//                     2.commentaire (id, auteur, contenu, id_article )
?>
<h1>Nouveautes : </h1>

<?php
$v1 = mysql_query('SELECT * FROM articles ORDER BY id DESC LIMIT 0,3');
while($info_article = mysql_fetch_array($v1)) {
?>
Nouveaute N <?php echo $info_article['id'] ?> publie par <?php echo $info_article['auteur']; ?> : <?php echo htmlspecialchars($info_article['titre']);?><br />
<?php echo (nl2br(htmlspecialchars($info_article['contenu']))); ?><br />

<hr />


<?php
}
?>

<br />


<!-- Blog basique THE END -->

