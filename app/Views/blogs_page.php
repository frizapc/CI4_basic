<h1>Friza ❤️ Vegy</h1>

<?php foreach ($blogs as $blog): ?>
    <h2><a href="http://localhost:8080/blogs/<?= $blog['url'] ?>"><?= $blog['title']; ?></a></h2>
    <p><?= $blog['content']; ?></p>
<?php endforeach ?>
