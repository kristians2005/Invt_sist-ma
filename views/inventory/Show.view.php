<?php require_once "views/partials/header.view.php"; ?>

<h1>Inventory Details</h1>

<p><strong>ID:</strong> <?= $inventory['id'] ?></p>
<p><strong>Product ID:</strong> <?= $inventory['product_id'] ?></p>
<p><strong>Product Name:</strong> <?= htmlspecialchars($inventory['product_name']) ?></p>
<p><strong>Quantity:</strong> <?= $inventory['quantity'] ?></p>
<p><strong>Location:</strong> <?= htmlspecialchars($inventory['location']) ?></p>

<a href="/inventory/edit/<?= $inventory['id'] ?>">Edit</a> |
<a href="/inventory/destroy/<?= $inventory['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a> |
<a href="/inventory">Back to List</a>
<?php require_once "views/partials/footer.view.php"; ?>