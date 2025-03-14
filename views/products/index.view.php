<?php require_once "views/partials/header.view.php"; ?>
<div class="p-10">
    <div class="p-8">
        <div class="flex justify-between items-center mb-6"></div>
        <h1 class="text-2xl font-bold">Product List</h1>
        <div class="space-x-2">
            <a href="/products/create" class="btn btn-primary">Add New Product</a>
            <a href="/inventory" class="btn btn-secondary">Inventory</a>
            <a href="/" class="btn">Dashboard</a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
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
                        <td class="space-x-2">
                            <a href="/products/show/<?= $product['id'] ?>" class="btn btn-info btn-xs">View</a>
                            <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-warning btn-xs">Edit</a>
                            <a href="/products/destroy/<?= $product['id'] ?>" class="btn btn-error btn-xs"
                                onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php require_once "views/partials/footer.view.php"; ?>