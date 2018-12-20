<?php
session_start();

include_once("header.php"); 
include_once("connection.php");

$getContent = "SELECT * FROM posts";
$result = $conn->query($getContent);
$posts = $result->fetchAll(PDO::FETCH_ASSOC);

?>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/fonts/css/all.css">
<link rel="stylesheet" href="style.css">

    <section>
      <div class="container">
        <div class="row">

    <?php if(count($posts) > 0): ?>
<?php 
  foreach($posts as $key=>$post):
  ?>

        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-header">
              <h4 class="card-tittle"> <?= $post['title']; ?> by <small class="text-danger"> <?= $_SESSION['username']; ?></small></h4>
              <p><?=date("M d", strtotime($post['post_date'])); ?></p>
            </div>
            <div class="card-body">
              <p class="card-text">
                <?= substr($post['content'], 0, 100); ?>...
                </p>
                <a href="single_post.php?id=<?= $post['id']; ?>"><p>continue reading</p></a>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
  <?php else: ?>
  <h1>No posts available, please check back later</h1>
  <?php endif; ?>

      </div>
    </div>
  </section>