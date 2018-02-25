<?php include 'header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
		<h3>User Nr.<?= $oneUser['id']; ?></h3>
			
		<form method="post" action="?/index/update/id/<?=$oneUser['id']; ?>">
			 <div class="form-group">
    <label for="formGroupExampleInput">Login editieren:</label>
    <input type="text" class="form-control" name="login" value="<?= $oneUser['login']; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password editieren:</label>
    <input type="password" class="form-control" name="password" value="<?=$oneUser['password']; ?>">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>