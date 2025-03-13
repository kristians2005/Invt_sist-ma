<?php require_once "views/partials/header.view.php"; ?>
<h1>Product Details</h1>

<p><strong>ID:</strong> <?= $product['id'] ?></p>
<p><strong>Name:</strong> <?= htmlspecialchars($product['name']) ?></p>
<p><strong>Description:</strong> <?= nl2br(htmlspecialchars($product['description'])) ?></p>
<p><strong>SKU:</strong> <?= htmlspecialchars($product['sku']) ?></p>
<p><strong>Price:</strong> $<?= number_format($product['price'], 2) ?></p>
<p><strong>Category:</strong> <?= htmlspecialchars($product['category']) ?></p>

<a href="/products/edit/<?= $product['id'] ?>">Edit</a> |
<a href="/products/destroy/<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a> |

<a href="/products">Back to List</a>
<?php require_once "views/partials/footer.view.php"; ?>

