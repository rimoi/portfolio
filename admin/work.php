<?php include('../partials/constants.php'); ?>
<?php include('../partials/auth.php'); ?>
<?php include('../partials/session.php'); ?>
<?php include('../partials/form.php'); ?>
<?php include('../partials/connect.php'); ?>
<?php include('../partials/admin_header.php');

// Suppression

if(isset($_GET['delete'])){
	checkCsrf();
	$id = $db->quote($_GET['delete']);
	$db->query("DELETE FROM categories WHERE id=$id");
	setFlash('la catégories à bien été supprimer !');
	header('Location:'.WEBROOT.'admin/category.php');
	die();
}
// Les Catégories
$resultat = $db->query('SELECT id,name,slug FROM categories;');
$categories = $resultat->fetchAll();
?>
		
			<h1>	Les Cat&eacute;gories  </h1>

<p><a href="category_edit.php" class="btn btn-success">Ajouter une nouvelle cat&eacute;gories</a></p>

<table class="tablet table-striped">
	<thead>
		<th>Id</th>
		<th>Nom</th>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php foreach($categories as $category): ?>
		<tr>
			<td><?= $category['id'] ?></td>
			<td><?= $category['name'] ?></td>
			<td>
				<a href="category_edit.php?id=<?= $category['id'];?>" class="btn btn-default">Modifier</a>
				<a href="?delete=<?= $category['id'];?>&<?= csrf(); ?>" class="btn btn-error" onclick="return confirm('Merci de confirmer votre suppression !');">Supprimer</a>
			</td>
		</tr>

		<?php endforeach; ?>
	</tbody>

</table>



<?php include('../partials/footer.php'); ?>
