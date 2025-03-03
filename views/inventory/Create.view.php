<h1>Add Inventory Item</h1>
<form action="/inventory/store" method="POST">
    <label>Product ID:</label>
    <input type="number" name="product_id" required>

    <label>Quantity:</label>
    <input type="number" name="quantity" required>

    <label>Location:</label>
    <input type="text" name="location">

    <button type="submit">Save</button>
</form>