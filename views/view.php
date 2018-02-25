<?php include 'header.php'; ?>
	<div class="container">
	<div class="row">
		<div class="col-md-6">
		<h2>Hello, <?= $_SESSION['user']['login']?>!</h2>
		<h3>All users</h3>
		<ul id="user-list">
			
		
	<?php foreach($allUsers as $user) : ?>

<div class="row"><div class="col-md-8"><li><a href="/?/index/show/id/<?= $user['id']?>"><?= $user['login']?></a></li></div><div class="col-md-4"><a href="?/index/delete/id/<?= $user['id']?>" type="button" class="btn btn-danger">Delete</a></div></div><hr/>

	<?php endforeach; ?>	
		</ul>
		</div>
		<div class="col-md-6">
			<a href="?/user/logout">Logout</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		<h4>Neuen User eintragen</h4>
			<form method="post" id="user-form" action="?/index/add">
  <div class="form-group">
    <label for="formGroupExampleInput">Login:</label>
    <input type="text" class="form-control" id="user-login" name="login" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password:</label>
    <input type="password" class="form-control" id="user-password" name="password" placeholder="">
  </div>
  <button type="submit" name="submit" id="user-create" class="btn btn-primary">Submit</button>
</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>

