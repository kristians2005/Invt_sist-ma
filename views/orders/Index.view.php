<?php require_once "views/partials/header.view.php"; ?>
<div class="p-20">
    <div class="p-8 container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">Order/deal view</h1>
            <a href="/orders/order" class="btn btn-primary">New order</a>
            <a href="/reports/orders" class="btn btn-primary">Generate a report on all orders</a>

        </div>

        <div class="card bg-base-100 shadow-xl mb-8"></div>
        <div class="card-body">
            <h2 class="card-title mb-4">Whats happening with the products</h2>
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Quantity</th>
                            <th>Location</th>
                            <th>Last Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['all_products'] as $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['sku']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['location'] ?: 'Nav norādīts'; ?></td>
                                <td><?php echo $item['updated_at']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-warning">Products that are about to go out of stock (less than 10)
                </h2>
                <?php if (empty($data['low_stock'])): ?>
                    <p class="text-gray-500 italic">No products with low stock
</p>
                <?php else: ?>
                    <ul class="menu bg-base-100">
                        <?php foreach ($data['low_stock'] as $item): ?>
                            <li class="text-warning">
                                <?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Stock:
                                <?php echo $item['quantity']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">
                Products Sold/Used (last 7 days)</h2>
                <?php if (empty($data['sold_utilized'])): ?>
                    <p class="text-gray-500 italic">No products sold or disposed of in the last 7 days</p>
                <?php else: ?>
                    <ul class="menu bg-base-100">
                        <?php foreach ($data['sold_utilized'] as $item): ?>
                            <li class="flex flex-col">
                                <span><?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Stock:
                                    <?php echo $item['quantity']; ?></span>
                                <span class="text-gray-500 text-sm">Updated: <?php echo $item['updated_at']; ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="card bg-base-100 shadow-xl">
    <div class="card-body p-20">
        <h2 class="card-title mb-4">All orders</h2>
        <div class="overflow-x-auto mb-[300px]">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Statuss</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['orders'] as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['user_name']; ?></td>
                            <td><?php echo $order['product_name']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td>
                                <div class="badge <?php echo match ($order['status']) {
                                    'pending' => 'badge-warning',
                                    'completed' => 'badge-success',
                                    'cancelled' => 'badge-error',
                                    default => 'badge-ghost'
                                }; ?>">
                                    <?php echo $order['status']; ?>
                                </div>
                            </td>
                            <td><?php echo $order['created_at']; ?></td>
                            <td class="flex gap-2">
                                <a href="/orders/show?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-info">View</a>
                                <button onclick="updateStatus(<?php echo $order['id']; ?>, 'completed')"
                                    class="btn btn-sm btn-success">Pabeigt</button>
                                <button onclick="updateStatus(<?php echo $order['id']; ?>, 'cancelled')"
                                    class="btn btn-sm btn-error">Cancel</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php require_once "views/partials/footer.view.php"; ?>