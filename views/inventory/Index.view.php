<h1>Inventory List</h1>
<a href="/inventory/create">Add New Item</a>
<a href="/products">Products</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Location</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($inventory as $item): ?>
        <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["product_id"] ?></td>
            <td><?= $item["quantity"] ?></td>
            <td><?= $item["location"] ?></td>
            <td>
                <a href="/inventory/show/<?= $item['id'] ?>">View</a> |
                <a href="/inventory/edit/<?= $item['id'] ?>">Edit</a> |
                <form action="/inventory/destroy/<?= $item['id'] ?>" onsubmit="return confirm('Are you sure?')"
                    method="POST" style="display:inline;">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>