<h1>Edit Product</h1>

<form action="/products/update?id=<?= $product['id'] ?>" method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>

    <label>Description:</label>
    <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea><br>

    <label>SKU:</label>
    <input type="text" name="sku" value="<?= htmlspecialchars($product['sku']) ?>" required><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>

    <label>Category:</label>
    <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required><br>

    <button type="submit">Update Product</button>
</form>

<a href="/products">Back to List</a>