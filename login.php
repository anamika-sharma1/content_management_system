<?php require("includes/db.php") ?>
<?php require("includes/function.php") ?>
<?php require("includes/session.php") ?>

<?php if(isset($_POST["submit"])){
$User = $_POST["username"];
$pass = $_POST["password"];

global $conn;
 $sql="select * from admins where username=:UserName and password=:Pass;";

  $stmt=$conn->prepare($sql);
  $stmt->bindValue(':UserName',$User);
  $stmt->bindValue(':Pass',$pass);

  $stmt->execute();
  $row_count=$stmt->fetchColumn();
 if($row_count>=1){
    Redirect_to("admin.html");
  }
  else{
    $_SESSION["ErrorMessage"]="Invalid Username or Password.";
    Redirect_to("login.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

<?php echo ErrorMessage();
echo SuccessMessage(); ?>

<section style="min-height:370px;margin-top:100px;">
  <div class="container">
    <div class="row" style="height:50px;">
      <div class="offset-lg-3 col-lg-6 " style="height:50px;">
        <form class="" action="login.php" method="post">
        <div class="card">
          <div class="card-header bg-secondary">
            <h1>Login as Admin</h1>
          </div>
          <div class="card-body bg-dark text-white">
            <div class="form-group">
              <label for="username1"><span style="font-size:1.2em; font-family:Merriweather; color:white;">Username :</span></label><br>
              <input class="form-control" type="text" name="username" id="username1" placeholder="Type Username Here" value="">
            </div>
            <div class="form-group mt-4">
              <label for="password1"><span style="font-size:1.2em; font-family:Merriweather; color:white;">Password :</span></label><br>
              <input class="form-control" type="password" name="password" id="password1" placeholder="Type Password Here" value="">
            </div>
            <div class="form-group">
              <input class="btn btn-warning btn-block mt-4" type="submit" name="submit" id="submit1" value="SUBMIT">
            </div>
          </div>
        </div>
        </form>      </div>
    </div>
  </div>
</section>
  <footer class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="text-center">CONTENT MANAGEMENT SYSTEM</p>
          <p class="text-center">Created by ANAMIKA SHARMA</p>
          <p class="text-center"> &copy;
            <script type="text/javascript">
              var year=new Date();
              document.write(year.getFullYear());
            </script> CCET</p>
        </div>
      </div>
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a2106bbec6.js" crossorigin="anonymous"></script>
  </body>
</html>
