<?= $this->extend("layout/template"); ?>

<?= $this->section('content'); ?>

<h4><a href="/" class='mt-4'>Back To List</a></h4>
<div class="container mt-4">
    <img src="<?= $comic["cover"] ?>" alt="" class='detail-cover'>
    <br><br>
    <?php if(!empty($_SESSION['username'])): ?>    
        <a href="/comic/edit/<?= $comic['id'] ?>" class='btn btn-warning'>Edit</a>
        <!-- <a href="/comic/delete/<?= $comic['id'] ?>" class='btn btn-danger'>Delete</a><br><br> -->
        <form action="/comic/<?= $comic['id'] ?>" method="POST" class="d-inline">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    <?php endif ?>
    <?php if(empty($_SESSION['username'])): ?>
    <a href="/comic/login" class="btn btn-primary">Sign as Admin</a>
    <?php endif ?>
    <h5>Title     : <?= $comic['title'] ?></h3>
    <h5>Author    : <?= $comic['author'] ?></h4>
    <h5>Publisher : <?= $comic['publisher'] ?></h4>
    <b>Synopsis</b>
    <p><?= $comic['synopsis'] ?></p>
</div>

<?= $this->endSection(); ?>