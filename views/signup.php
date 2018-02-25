<?php include 'header.php'; ?>


<div class="container">
<?php if(isset($_SESSION['errors'])) : ?>
  <div class="p-3 mb-2 bg-danger text-white">
    <?= $_SESSION['errors']; unset($_SESSION['errors']);?>
  </div>
<?php endif; ?>

<?php if(isset($_SESSION['success'])) : ?>
  <div class="p-3 mb-2 bg-success text-white">
    <?= $_SESSION['success']; unset($_SESSION['success']);?>
  </div>
<?php endif; ?>

<h3>Registrieren</h3>
<form method="post" action="?/user/signup">
  <div class="form-group">
    <label for="exampleInputLogin1">Login</label>
    <input type="text" name="login" class="form-control" id="exampleInputLogin1" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ?  htmlspecialchars($_SESSION['form_data']['login']) : '';?>">
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="<?= isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name']) : '';?>">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : '';?>">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include 'footer.php'; ?>