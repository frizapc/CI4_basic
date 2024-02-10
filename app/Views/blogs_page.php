<h1>Friza ❤️ Vegy</h1>

<?php foreach ($blogs as $blog): ?>
    <h2><a href="/blogs/<?= $blog['url'] ?>"><?= $blog['title']; ?></a></h2>
    <p><?= $blog['content']; ?></p>
    <div>
        <a href="/blogs/edit/<?= $blog['id'] ?>">edit</a> ------ <a href="/blogs/delete/<?= $blog['id'] ?>">delete</a>
    </div>
<?php endforeach ?>
