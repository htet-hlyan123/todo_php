<?php
require 'config.php';
if($_POST){
	$title = $_POST['title'];
	$desc = $_POST['description'];
	$sql = "INSERT INTO todo(title, description) VALUES(:title, :description)";
	$statement = $pdo->prepare($sql);
	$result = $statement->execute( array(':title' => $title, ':description' => $desc) );
	if($result){
		echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
	}
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
			<h2>Create New Todo</h2>
			<form action="add.php" method="post">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" rows="8" cols="80"></textarea>
				</div><br>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="ADD"> 
					<a href="index.php" type="button" class="btn btn-warning">Back</a> 
				</div>
			</form>
		</div>
	</div>

</body>
</html>