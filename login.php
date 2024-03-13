<?php
require_once('database.php');
session_start();

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    if (cek_login($_POST['username'], $_POST['password'])) {
      $_SESSION['username'] = $username;
      $_SESSION['status'] = "login";
      if ($_SESSION['role'] == "Admin") {
        header("location:home.php");
      } else {
        header("location:MemberSCR/home.php");
      }
    } else {
        
      header("location:login.php?msg=GagalLogin");
    }
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
    
</head>

<body>
    <div class="containerku">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 rapih">
                    <h1>Sign in</h1>
                    <h4>Insert your username and password to continue</h4>
                    <div class="inputtype">
                   <input type="username" name="username" id="" placeholder="Username">
                   <input type="password" name="password" id="" placeholder="Password">
                   <div class="posbutton">
                   <button type="submit" name="masuk">Sign in</button>
                   </div>
                    </div>
                </div>
                <div class="col rapih"> 
                    <div class="toggle">
                        <div class="toggel-panel">
                    <h1>Hi There!</h1>
                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit aperiam dicta reiciendis saepe explicabo vitae tempora excepturi ducimus sequi perspiciatis.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>

</html>