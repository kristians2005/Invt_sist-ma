<?php require_once "views/partials/header.view.php"; ?>
<div class="p-20">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Inventory List</h1>
            <div class="space-x-2">
                <a href="/inventory/create" class="btn btn-primary">Add New Item</a>
                <a href="/products" class="btn btn-secondary">Products</a>
                <a href="/" class="btn">Dashboard</a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Summ</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory as $item): ?>
                        <tr>
                            <td><?= $item["id"] ?></td>
                            <td><?= $products[$item["product_id"]]['name'] ?? 'Unknown Product' ?></td>
                            <td><?= $products[$item["product_id"]]['price'] ?? 'Unknown Product' ?>&nbsp;€</td>
                            <td><?= $products[$item["product_id"]]['price'] * $item["quantity"] ?? 'Unknown Product' ?>&nbsp;€
                            </td>
                            <td><?= $item["quantity"] ?></td>
                            <td><?= $item["location"] ?></td>
                            <td class="space-x-2">
                                <a href="/inventory/show/<?= $item['id'] ?>" class="btn btn-info btn-sm">View</a>
                                <a href="/inventory/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/inventory/destroy/<?= $item['id'] ?>"
                                    onsubmit="return confirm('Are you sure?')" method="POST" class="inline">
                                    <button type="submit" class="btn btn-error btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once "views/partials/footer.view.php"; ?>