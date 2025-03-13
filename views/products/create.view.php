<?php require_once "views/partials/header.view.php"; ?>
<h1>Add New Product</h1>

<form action="/products/store" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Description:</label>
    <textarea name="description"></textarea><br>

    <label>SKU:</label>
    <input type="text" name="sku" required><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" required><br>

    <label>Category:</label>
    <input type="text" name="category" required><br>

    <button type="submit">Create Product</button>
</form>

<a href="/products">Back to List</a>
<?php require_once "views/partials/header.view.php"; ?>