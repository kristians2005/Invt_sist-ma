<h1>Edit Inventory Item</h1>
<form action="/inventory/update/<?= $item['id'] ?>" method="POST">
    <label>Product:</label>
    <select name="product_id" required>
        <option value="">Select a product</option>
        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>" <?= $product['id'] === $item['product_id'] ? "selected" : "" ?>>
                <?= htmlspecialchars($product['name']) ?> (ID: <?= $product['id'] ?>)
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <label>Quantity:</label>
    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" required>

    <label>Location:</label>
    <input type="text" name="location" value="<?= $item['location'] ?>">

    <button type="submit">Update</button>
</form>