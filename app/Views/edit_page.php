<h1>Edit Blog</h1>
<form action="/blogs/edit/<?= $blog['id']; ?>" method="post">
    <input type="hidden" name="_method" value="PUT">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $blog['title']; ?>">
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="" cols="30" rows="10"><?= $blog['content']; ?></textarea>
    </div>
    <button type="submit">Submit</button>
</form>