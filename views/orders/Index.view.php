<?php require_once "views/partials/header.view.php"; ?>
<div class="p-20">
    <div class="p-8 container mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold">Pasūtījumu/Darījumu Skats</h1>
            <a href="/orders/order" class="btn btn-primary">Jauns Pasūtījums</a>
        </div>

        <div class="card bg-base-100 shadow-xl mb-8"></div>
        <div class="card-body">
            <h2 class="card-title mb-4">Kas notiek ar produktiem</h2>
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Nosaukums</th>
                            <th>SKU</th>
                            <th>Atlikums</th>
                            <th>Atrašanās vieta</th>
                            <th>Pēdējais atjauninājums</th>
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
                <h2 class="card-title text-warning">Produkti, kas iet uz beigām (mazāk par 10)</h2>
                <?php if (empty($data['low_stock'])): ?>
                    <p class="text-gray-500 italic">Nav produktu ar zemu atlikumu</p>
                <?php else: ?>
                    <ul class="menu bg-base-100">
                        <?php foreach ($data['low_stock'] as $item): ?>
                            <li class="text-warning">
                                <?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Atlikums:
                                <?php echo $item['quantity']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Pārdotie/Utilizētie produkti (pēdējās 7 dienās)</h2>
                <?php if (empty($data['sold_utilized'])): ?>
                    <p class="text-gray-500 italic">Nav pārdoto vai utilizēto produktu pēdējo 7 dienu laikā</p>
                <?php else: ?>
                    <ul class="menu bg-base-100">
                        <?php foreach ($data['sold_utilized'] as $item): ?>
                            <li class="flex flex-col">
                                <span><?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Atlikums:
                                    <?php echo $item['quantity']; ?></span>
                                <span class="text-gray-500 text-sm">Atjaunots: <?php echo $item['updated_at']; ?></span>
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
        <h2 class="card-title mb-4">Visi pasūtījumi</h2>
        <div class="overflow-x-auto mb-[300px]">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lietotājs</th>
                        <th>Produkts</th>
                        <th>Daudzums</th>
                        <th>Statuss</th>
                        <th>Izveidots</th>
                        <th>Darbības</th>
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
                                <a href="/orders/show?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-info">Skatīt</a>
                                <button onclick="updateStatus(<?php echo $order['id']; ?>, 'completed')"
                                    class="btn btn-sm btn-success">Pabeigt</button>
                                <button onclick="updateStatus(<?php echo $order['id']; ?>, 'cancelled')"
                                    class="btn btn-sm btn-error">Atcelt</button>
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