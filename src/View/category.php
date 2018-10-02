<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Category</h1>
    <ul>
        <?php foreach ($categorys as $category) : ?>
        <a href="category/<?= $category['id']?>"><li><?= $category['name']?></li>
        <?php endforeach ?>
    </ul>
    <a href='/'>Back to items list</a>
</section>
</body>
</html>
