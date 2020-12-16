<?= $this->extend("layout/template"); ?>

<?= $this->section('content'); ?>
<h4><a href="/" class='mt-4'>Back To List</a></h4>
<div class="container mt-4">
<form action="/comic/update\<?= $comic['id'] ?>" method="post">
    <?= csrf_field(); ?>
    <div class="form-group col-md-6">
      <label for="title">Title</label>
      <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid':'' ?>" id="title" placeholder="Title" name="title" value="<?= $comic['title'] ?>">
      <div class="invalid-feedback">
        <?= $validation->getError('title') ?>
      </div>
    </div>
  <div class="form-group col-md-6">
    <label for="link-cover">Link Cover</label>
    <input type="text" class="form-control" id="link-cover" placeholder="link gambar myanimelist" name="cover" value="<?= $comic['cover'] ?>">
  </div>
  <div class="form-group col-md-6">
    <label for="author">Author</label>
    <input type="text" class="form-control <?= $validation->hasError('author') ? 'is-invalid':'' ?>" id="author" placeholder="Author" name="author" value="<?= $comic['author'] ?>">
    <div class="invalid-feedback">
        <?= $validation->getError('author') ?>
      </div>
  </div>
  <div class="form-group col-md-6">
    <label for="publisher">Publisher</label>
    <input type="text" class="form-control <?= $validation->hasError('publisher') ? 'is-invalid':'' ?>" id="publisher" placeholder="Publisher" name="publisher" value="<?= $comic['publisher'] ?>">
    <div class="invalid-feedback">
        <?= $validation->getError('publisher') ?>
    </div>
  </div>
  <div class="form-group">
    <label for="synopsis">Synopsis</label>
    <textarea class="form-control" id="synopsis" rows="3" name="synopsis" value=<?= $comic['synopsis'] ?>"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
<?= $this->endSection(); ?>