<?php include 'header.php'; ?>


<div class="container">
<?php if(isset($_SESSION['errors'])) : ?>
  <div class="p-3 mb-2 bg-danger text-white">
    <?= $_SESSION['errors']; unset($_SESSION['errors']);?>
  </div>
<?php endif; ?>


<h3>Log in</h3>
<form method="post" action="?/user/login">
  <div class="form-group">
    <label for="exampleInputLogin1">Login</label>
    <input type="text" name="login" class="form-control" id="exampleInputLogin1" placeholder="Login" >
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include 'footer.php'; ?>