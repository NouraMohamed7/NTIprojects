
<?php session_start();
if(isset($_SESSION['errors'])){
  foreach($_SESSION['errors'] as $error){
    echo $error ;
  };
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- <form class="container" method="post" action="index.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">number 1</label>
    <input type="number" name="num1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">number 2</label>
    <input type="number" name="num2" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <select name="operation" >
    <option value="+">+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
  </select>

    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

<form class="container" action="index.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">user-name</label>
    <input type="text" class="form-control" name="name" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'];?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password"  value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'];?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" name="check" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>