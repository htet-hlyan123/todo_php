<?php
require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<?php
	$statement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
	$statement->execute();
	$result = $statement->fetchAll();
	?>

	<div class="card">
		<div class="card-body">
			<h2>TODO HOME PAGE</h2>
			<div>
				<a href="add.php" type="button" class="btn btn-success">Create New</a>
				
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>ID</td>
						<td>Title</td>
						<td>Description</td>
						<td>Created</td>
						<td>Actions</td>
					</th>
				</thead>
				<tbody>
					<?php
					$i=0;
					if ($result) {
						foreach ($result as $value) {
					?>
					
					<tr>
						<td><?php echo $i; ?></td>
					    <td><?php echo $value['title']; ?></td>
					    <td><?php echo $value['description']; ?></td>
					    <td><?php echo date( "Y-m-d", strtotime($value['created_at']) ); ?></td>
					    <td><a href="edit.php?id=<?php echo $value['id'];?>" type="button" class="btn btn-warning">Edit</a> 
					    	<a href="delete.php?id=<?php echo $value['id'];?>" type="button" class="btn btn-danger">Delete</a></td>
					</tr>
					<?php	
					$i++;	
						
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


</body>
</html>