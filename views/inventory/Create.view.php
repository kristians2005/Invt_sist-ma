<form action="/inventory/store" method="POST">
    <label>Product ID:</label>
    <input type="number" name="product_id" required><br>

    <label>Quantity:</label>
    <input type="number" name="quantity" required><br>

    <label>Location:</label>
    <input type="text" name="location" required><br>

    <button type="submit">Add to Inventory</button>
</form>