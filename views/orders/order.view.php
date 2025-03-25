<?php require_once "views/partials/header.view.php"; ?>
<div class="pt-20">

    <div class="container mx-auto p-4">

        <?php if (isset($data['success'])): ?>
            <div class="alert alert-success"><?php echo $data['success']; ?></div>
        <?php endif; ?>
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-error"><?php echo $data['error']; ?></div>
        <?php endif; ?>

        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Location</th>
                        <th>Order</th>
                        <th>Details</th>
                    </tr>
                   
                </thead>
                <tbody>
                    <?php foreach ($data['products'] as $product): ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['sku']; ?></td>
                            <td><?php echo $product['description'] ?: 'Nav apraksta'; ?></td>
                            <td><?php echo $product['price']; ?> EUR</td>
                            <td><?php echo $product['category']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td><?php echo $product['location'] ?: 'Nav norādīts'; ?></td>
                            <td>
                                <form method="POST" action="/orders/order" class="flex gap-2">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="number" name="quantity" min="1" max="<?php echo $product['quantity']; ?>"
                                        required class="input input-bordered input-sm w-20">
                                    <button type="submit" class="btn btn-primary btn-sm">Order</button>
                                </form>
                            </td>
                            <td>
                                <a href="/orders?action=show&id=<?php echo $product['id']; ?>"
                                    class="btn btn-ghost btn-sm">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="/orders" class="btn btn-outline">Back to Overview</a>
        </div>

    </div>
    <?php require_once "views/partials/footer.view.php"; ?>