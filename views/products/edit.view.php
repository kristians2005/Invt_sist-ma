<?php require_once "views/partials/header.view.php"; ?>
<div class=" p-20">
    <h1 class="text-3xl font-bold mb-6">Edit Product</h1>

    <form action="/products/update/<?= $product['id'] ?>" method="POST" class="card bg-base-200 p-6 max-w-2xl">
        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Name:</span>
            </label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required
                class="input input-bordered w-full">
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Description:</span>
            </label>
            <textarea name="description"
                class="textarea textarea-bordered h-24"><?= htmlspecialchars($product['description']) ?></textarea>
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">SKU:</span>
            </label>
            <input type="text" name="sku" value="<?= htmlspecialchars($product['sku']) ?>" required
                class="input input-bordered w-full">
        </div>

        <div class="form-control mb-4">
            <label class="label">
                <span class="label-text">Price:</span>
            </label>
            <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required
                class="input input-bordered w-full">
        </div>

        <div class="form-control mb-6">
            <label class="label">
                <span class="label-text">Category:</span>
            </label>
            <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required
                class="input input-bordered w-full">
        </div>

        <div class="flex gap-4">
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="/products" class="btn btn-ghost">Back to List</a>
        </div>
    </form>
</div>
<?php require_once "views/partials/footer.view.php"; ?>