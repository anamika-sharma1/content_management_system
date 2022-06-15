<?php require("includes/db.php") ?>
<?php require("includes/function.php") ?>
<?php require("includes/session.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,300&display=swap" rel="stylesheet">
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
          <a href="login.php" class="nav-link" style="color:white;">Sign In</a>
        </li>

      </ul>
      </div>
    </div>
  </nav>


<section style="min-height:250px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-2">
<table class="table table-striped">
  <thead class="text-white" style="background:black;">
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Category</th>
    <th>Date & Time</th>
    <th>Author</th>
    <th>Banner</th>
    <th>Live Preview</th>
  </tr>
    </thead>
  <?php  global $conn;
  $sql = "select * from posts";
  $stmt=$conn->query($sql);
  $s=0;
  while($DataRows=$stmt->fetch()){
    $id= $DataRows["id"];
    $datetime=$DataRows["datetime"];
    $posttitle=$DataRows["title"];
    $category=$DataRows["category"];
    $admin=$DataRows["author"];
    $image=$DataRows["image"];
    $posttext=$DataRows["post"];
$s++;
  ?>
<tbody>
  <tr>
    <td><?php echo $s; ?></td>
    <td><?php echo $posttitle; ?></td>
    <td><?php echo $category ?></td>
    <td><?php echo $datetime ?></td>
    <td><?php echo $admin ?></td>
    <td>
      <img src="uploads/<?php echo $image; ?>" width="100px" height="50px">

    <td>
      <a href="uploads/<?php echo $image; ?>" class="btn btn-primary btn-block">Live Preview</a>
    </td>
  </tr>
  </tbody>
  <?php } ?>
</table>
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
