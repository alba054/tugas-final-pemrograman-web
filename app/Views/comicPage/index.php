<?= $this->extend("layout/template"); ?>
<!-- <?php 
// if(!isset($_SESSION)) 
// { 
//   session_start(); 
// } 
// ?> -->
<?= $this->section('content'); ?>
<div class="container mt-4">
    <h1>My Favorite Comics List</h1><br>
    <a href="<?= !empty($_SESSION['username']) ? '/comic/createcomic':'/comic/login' ?>" class="btn btn-primary"><?= !empty($_SESSION['username']) ? 'Add Comic':'Sign In as Admin' ?></a><br><br>
    <!-- <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Publisher</th>
            <th scope="col">Created At</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach($comics as $comic): ?>
        <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><img src="<?= $comic['cover'] ?>" alt="" class="cover"></td>
            <td><?= $comic['title'] ?></td>
            <td><?= $comic['author'] ?></td>
            <td><?= $comic['publisher'] ?></td>
            <td><?= $comic['created_at'] ?></td>
            <td><a href="/<?= $comic['id'] ?>">Click Here</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
</div> -->

<div class="row">
<?php foreach($comics as $comic): ?>
  <div class="col-md-3 mr-4">
    <div class="card" style="width: 18rem;">
    <img src="<?= $comic['cover'] ?>" class="card-img-top cover" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $comic['title'] ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $comic['created_at'] ?></h6>
      <p class="card-text"><?= substr($comic['synopsis'], 0, 150) ?>... <a href="/comic/<?= $comic['id'] ?>" class="card-link">Read more</a></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><?= $comic['author'] ?></li>
      <li class="list-group-item"><?= $comic['publisher'] ?></li>
    </ul>
    </div>
  </div>
<?php endforeach ?>
</div>

<?= $this->endSection(); ?>