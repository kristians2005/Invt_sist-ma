<h1>Edit Inventory Item</h1>
<form action="/inventory/update/<?= $item['id'] ?>" method="POST">
    <label>Quantity:</label>
    <input type="number" name="quantity" value="<?= $item['quantity'] ?>" required>

    <label>Location:</label>
    <input type="text" name="location" value="<?= $item['location'] ?>">

    <button type="submit">Update</button>
</form>