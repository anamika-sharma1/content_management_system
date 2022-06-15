
<?php require("includes/db.php") ?>
<?php require("includes/function.php") ?>
<?php require("includes/session.php") ?>

<?php if(isset($_POST['submit'])){
  $Category=$_POST['Title'];
  $Admin = "Anamika";

  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

  if(empty($Category)){
    $_SESSION["ErrorMessage"]="Fill all fields.";
    Redirect_to("Categories.php");
  }
  elseif (strlen($Category)<3) {
    $_SESSION["ErrorMessage"]="Category Title should be greater than 2 characters.";
    Redirect_to("Categories.php");
  }
  elseif (strlen($Category)>49) {
    $_SESSION["ErrorMessage"]="Category Title should be less than 50 characters.";
    Redirect_to("Categories.php");
  }

  else {
    global $conn;
    $sql="insert into category (title,author,datetime) values (:Category,:adminName,:dateTime);";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(':Category',$Category);
    $stmt->bindValue(':adminName',$Admin);
    $stmt->bindValue(':dateTime',$DateTime);
    $Execute=$stmt->execute();

    if($Execute){
      $_SESSION["SuccessMessage"]="Category with id : " . $conn->lastInsertId() . " added successfully.";
      Redirect_to("Categories.php");
    }
    else{
      $_SESSION["SuccessMessage"]="Something went Wrong! Try Again.";
      Redirect_to("Categories.php");
    }
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Practical 10</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="posts.php" class="nav-link" style="color:white;">Posts</a>
        </li>
        <li class="nav-item">
          <a href="Categories.php" class="nav-link" style="color:white;">Categories</a>
        </li>
        <li class="nav-item">
          <a href="addnewadmin.php" class="nav-link" style="color:white;">Manage Admins</a>
        </li>
        <li class="nav-item">
          <a href="blogpost.php" class="nav-link" style="color:white;">Live Blog</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="logout.php" class="nav-link" style="color:white;"><i class="fas fa-user-times"></i> Logout</a>
        </li>
      </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-2 mb-2 text-center bg-secondary text-white">
    <h1 class="display-6"><i class="fas fa-edit"></i>Manage Categories</h1>
  </div>
<section class="mt-3" style="min-height:340px;">
<div class="container">
  <div class="row" style="height:10px;">
    <div class="offset-lg-2 col-lg-8" style="height:10px;">
      <?php echo ErrorMessage();
      echo SuccessMessage(); ?>
      <form class="" action="categories.php" method="post">
      <div class="card">
      <div class="card-header bg-secondary">
        <span style="font-size:2em; font-family:Merriweather; color:white;">Add New Category</span>
      </div>
      <div class="card-body bg-dark">
        <div class="form-group">
          <label for="title"><span style="font-size:1.2em; font-family:Merriweather; color:white;">Category Title :</span></label><br>
          <input class="form-control" type="text" name="Title" id="title" placeholder="Type title Here" value="">
        </div>

        <div class="row mt-4">
          <div class="col-lg-6 text-center" >
            <a href="dashboard.php" class="btn btn-warning btn-block" style="width:100%;">Back to Dashboard</a>
          </div>
          <div class="col-lg-6 text-center">

<input type="submit" name="submit" class="btn btn-success btn-block" style="width:100%;">Publish/>
</div>
        </div>
      </div>
      </div>
      </form>
    </div>
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
