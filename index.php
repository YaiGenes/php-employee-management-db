<?php 
session_start();
// $info = $_SESSION["info"];
// $isSuscribed=true;
// $isSuscribed=$_SESSION["issuscribed"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Management</title>
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link href="./assets/css/login.css" rel="stylesheet" />
  <script src="./node_modules/jquery/dist/jquery.min.js"></script>
  <!-- AJAX script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>

  <form class="form-signin align-items-center" action="./src/library/loginManager.php" method="POST">
    <img class="mb-4" src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg" alt="" width="80" height="80" />
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputName" class="sr-only">User Name</label>
    <input type="text" id="inputName" name="username" class="form-control mb-2" placeholder="Enter your full name"
      required autofocus="" />
    <label for="inputPass" class="sr-only">Password</label>
    <input type="password" id="inputPass" name="pass" class="form-control" placeholder="Enter your Password."
      required />
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
      Sign in
    </button>
  </form>
  <p class="mt-5 mb-3 text-muted">PHP Employee Management</p>

  <!-- <form class="form-signin align-items-center" action="./src/library/loginManager.php" method="POST">
    <img class="mb-4" src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg" alt="" width="80" height="80" />
    <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>
    <label for="inputName" class="sr-only">User Name</label>
    <input type="text" id="inputName" name="username" class="form-control mb-2" placeholder="Enter your full name"
      required autofocus="" />
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" name="email" class="form-control mb-2" placeholder="Enter your email" required
      autofocus="" />
    <label for="inputPass" class="sr-only">Password</label>
    <input type="password" id="inputPass" name="pass" class="form-control" placeholder="Enter your Password."
      required />
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
      Register
    </button>
  </form> -->
  <!-- <p class="mt-5 mb-3 text-muted">PHP Employee Management</p> -->


  <script src="./assets/js/userGet.js"></script>
</body>

</html>