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

<header class="bg-dark mt-1 text-white">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12 mb-3">
        <h1><i class="fas fa-blog"></i>Blog Posts</h1>
      </div>
<div class="col-lg-4 mb-3" style="font-family:Source Serif Pro; font-size:1.2em;">
  <a href="posts.php" class="btn btn-primary btn-block" style="width:100%;">
    <i class="fas fa-edit"> Add New Post</i>
  </a>
</div>
<div class="col-lg-4 mb-3" style="font-family:Source Serif Pro; font-size:1.2em;">
  <a href="Categories.php" class="btn btn-primary btn-info" style="width:100%;">
    <i class="fas fa-folder-plus"> Add New Category</i>
  </a>
</div>
<div class="col-lg-4 mb-3" style="font-family:Source Serif Pro; font-size:1.2em;">
  <a href="Admins.php" class="btn btn-warning btn-info" style="width:100%;">
    <i class="fas fa-user-plus"> Add New Admin</i>
  </a>
</div>
    </div>
  </div>
</header>
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
    <th>Action</th>
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
      <a href="updatepost.php?id=<?php $id; ?>" class="btn btn-warning btn-block">Edit</a>
      <a href="deletepost.php?id=<?php $id; ?>" class="btn btn-danger btn-block">Delete</a>
    </td>
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
