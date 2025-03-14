<?php require_once "views/partials/header.view.php"; ?>
<div class="p-20">
    <h1 class="text-3xl font-bold mb-6">Edit Inventory Item</h1>

    <form action="/inventory/update/<?= $item['id'] ?>" method="POST" class="form-control w-full max-w-lg">
        <div class="mb-4">
            <label class="label">
                <span class="label-text">Product:</span>
            </label>
            <select name="product_id" required class="select select-bordered w-full">
                <option value="">Select a product</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>" <?= $product['id'] === $item['product_id'] ? "selected" : "" ?>>
                        <?= htmlspecialchars($product['name']) ?> (ID: <?= $product['id'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="label">
                <span class="label-text">Quantity:</span>
            </label>
            <input type="number" name="quantity" value="<?= $item['quantity'] ?>" required
                class="input input-bordered w-full">
        </div>

        <div class="mb-4">
            <label class="label">
                <span class="label-text">Location:</span>
            </label>
            <input type="text" name="location" value="<?= $item['location'] ?>" class="input input-bordered w-full">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>
<?php require_once "views/partials/footer.view.php"; ?></label>