<?php require_once "views/partials/header.view.php"; ?>
<div class="container mx-auto p-20">
    <h1 class="text-3xl font-bold mb-6">Product Details</h1>

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="grid gap-4">
                <div class="grid grid-cols-2">
                    <p class="font-bold">ID:</p>
                    <p><?= $product['id'] ?></p>
                </div>
                <div class="grid grid-cols-2">
                    <p class="font-bold">Name:</p>
                    <p><?= htmlspecialchars($product['name']) ?></p>
                </div>
                <div class="grid grid-cols-2">
                    <p class="font-bold">Description:</p>
                    <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                </div>
                <div class="grid grid-cols-2">
                    <p class="font-bold">SKU:</p>
                    <p><?= htmlspecialchars($product['sku']) ?></p>
                </div>
                <div class="grid grid-cols-2">
                    <p class="font-bold">Price:</p>
                    <p>$<?= number_format($product['price'], 2) ?></p>
                </div>
                <div class="grid grid-cols-2">
                    <p class="font-bold">Category:</p>
                    <p><?= htmlspecialchars($product['category']) ?></p>
                </div>
            </div>

            <div class="card-actions justify-end mt-6">
                <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="/products/destroy/<?= $product['id'] ?>" class="btn btn-error"
                    onclick="return confirm('Are you sure?')">Delete</a>
                <a href="/products" class="btn btn-ghost">Back to List</a>
            </div>
        </div>
    </div>
</div>
<?php require_once "views/partials/footer.view.php"; ?></div>