<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="bg-body-secondary d-flex flex-column-reverse flex-sm-row p-3 my-2 justify-content-between">
    <div class="my-1 my-sm-0">
        <form action="" method="get" class="d-flex">
            <input type="text" name="find" id="find" class="form-control">
            <button type="submit" class="btn btn-outline-success btn-sm">Cari</button>
        </form>
    </div>
    <div class="my-1 my-sm-0">
        <a href="/blogs/add" class="btn btn-info">Tambah Blog</a>
    </div>
</div>
<div class="row m-1 m-sm-5">
    <?php foreach ($blogs as $blog): ?>
        <div class="col-sm-6">
            <div class="m-1 bg-body-secondary p-2">
                <h2><a href="/blogs/<?= $blog['url'] ?>"><?= $blog['title']; ?></a></h2>
                <p><?= $blog['content']; ?></p>
                <div>
                    <a href="/blogs/edit/<?= $blog['id'] ?>">edit</a> ------ 
                    <form action="/blogs/delete/<?= $blog['id'] ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">hapus</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>