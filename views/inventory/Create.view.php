<?php require_once "views/partials/header.view.php"; ?>
<div class=" pt-20">
    <h1 class="text-4xl font-bold text-center mb-6">Add to Inventory</h1>
    <form action="/inventory/store" method="POST" class="form-control w-full max-w-xs mx-auto space-y-4">
        <div class="form-control">
            <label class="label">
                <span class="label-text">Product:</span>
            </label>
            <select name="product_id" required class="select select-bordered w-full">
                <option value="">Select a product</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>">
                        <?= htmlspecialchars($product['name']) ?> (ID: <?= $product['id'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Quantity:</span>
            </label>
            <input type="number" name="quantity" required class="input input-bordered w-full">
        </div>

        <div class="form-control">
            <label class="label">
                <span class="label-text">Location:</span>
            </label>
            <input type="text" name="location" required class="input input-bordered w-full">
        </div>

        <button type="submit" class="btn btn-primary w-full">Add to Inventory</button>
    </form>
</div>
<?php require_once "views/partials/footer.view.php"; ?>