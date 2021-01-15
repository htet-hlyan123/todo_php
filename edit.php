
<?php
require 'config.php';
if($_POST){
	$title = $_POST['title'];
	$desc = $_POST['description'];
	$id = $_POST['id'];
	$statement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
	$result = $statement->execute();
	if ($result) 
		echo "<script>alert('New ToDo is edited');window.location.href='index.php';</script>";

} else{
	$statement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
	$statement->execute();
	$result = $statement->fetchAll();
	
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Edit New Todo</h2>
			<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $result[0]['id']?>">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'];?>">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="8" cols="80"><?php
					echo $result[0]['description'];?></textarea>
				</div><br>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="EDIT"> 
					<a href="index.php" type="button" class="btn btn-warning">Back</a> 
				</div>
			</form>
		</div>
	</div>

</body>
</html>
