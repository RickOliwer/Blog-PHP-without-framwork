<?php include 'header-array.php'; ?>
<ul class="nav_links">
<?php foreach($navItems as $items): ?>
<li><a href="<?= $items['slug'] ?>"> <?= $items['title']?> </a></li>
<?php endforeach ; ?>
</ul>