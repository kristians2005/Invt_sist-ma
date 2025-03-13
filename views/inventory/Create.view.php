<?php require_once "views/partials/header.view.php"; ?>
<form action="/inventory/store" method="POST">
    <label>Product:</label>
    <select name="product_id" required>
        <option value="">Select a product</option>
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>">
                <?= htmlspecialchars($product['name']) ?> (ID: <?= $product['id'] ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <br>

    <label>Quantity:</label>
    <input type="number" name="quantity" required><br>

    <label>Location:</label>
    <input type="text" name="location" required><br>

    <button type="submit">Add to Inventory</button>
</form>
<?php require_once "views/partials/footer.view.php"; ?>