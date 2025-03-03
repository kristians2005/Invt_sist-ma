<h1>Product List</h1>

<a href="/products/create">Add New Product</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['sku']) ?></td>
                <td>$<?= number_format($product['price'], 2) ?></td>
                <td><?= htmlspecialchars($product['category']) ?></td>
                <td>
                    <a href="/products/show/<?= $product['id'] ?>">View</a> |
                    <a href="/products/edit?id=<?= $product['id'] ?>">Edit</a> |
                    <a href="/products/destroy?id=<?= $product['id'] ?>"
                        onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>