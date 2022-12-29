<h1>User List</h1>
<?php if (empty($users)) : ?>
    <p>No users found.</p>
<?php else : ?>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><a href="index.php?id=<?= $user['id'] ?>"><?= $user['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>