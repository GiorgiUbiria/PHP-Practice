<?php if ($user !== null): ?>
    <h1>User Details</h1>
    <p>ID: <?= $user['id'] ?></p>
    <p>Name: <?= $user['name'] ?></p>
    <p>Email: <?= $user['email'] ?></p>
<?php else: ?>
    <p>User not found</p>
<?php endif; ?>
