<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<?= form_open("/blogs/edit/".$blog['id']); ?>
    <?= form_hidden ('_method', 'PUT'); ?>
    <div class="container mx-auto w-50 my-3 bg-body-secondary py-3 rounded-3">
        <div class="mb-3">
            <?= form_label('Ubah Judul', 'exampleFormControlInput1'); ?>
            <?= form_input('title', $blog['title'], 'class="form-control" id="exampleFormControlInput1"'); ?>
        </div>
        <div class="mb-3">
            <?= form_label('Ubah Konten', 'exampleFormControlTextarea1'); ?>
            <?= form_textarea('content', $blog['content'], 'class="form-control" id="exampleFormControlTextarea1" rows="3"'); ?>
        </div>
        <button type="submit" class="btn btn-success mx-auto d-block">Submit</button>
    </div>
</form>
<?= form_close(); ?>
<?= $this->endSection(); ?>  