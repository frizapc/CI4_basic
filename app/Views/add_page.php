<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

 <p><?= anchor('form', 'Try it again!') ?></p>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?php if (!empty($validation->getErrors())) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($validation->getErrors() as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?= form_open_multipart('/blogs/add'); ?>
    <div class="container mx-auto w-50 my-3 bg-body-secondary py-3 rounded-3">
        <div class="mb-3">
            <?= form_label('Judul Blog', 'exampleFormControlInput1'); ?>
            <?= form_input('title', '', 'class="form-control" id="exampleFormControlInput1"'); ?>
        </div>
        <div class="mb-3">
            <?= form_label('Konten Blog', 'exampleFormControlTextarea1'); ?>
            <?= form_textarea('content', '', 'class="form-control" id="exampleFormControlTextarea1" rows="3"'); ?>
        </div>
        <div class="mb-3">
            <?= form_label('Upload', 'cover'); ?>
            <?= form_upload('cover', '', 'class=form-control id=cover') ?>
        </div>
        <button type="submit" class="btn btn-success mx-auto d-block">Submit</button>
    </div>
<?= form_close(); ?>
<?= $this->endSection(); ?>