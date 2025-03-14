<?php require_once "views/partials/header.view.php"; ?>

<div class="container mx-auto p-20">
    <h1 class="text-3xl font-bold mb-6">Inventory Details</h1>

    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="grid grid-cols-2 gap-4">
                <p class="flex gap-2"><span class="font-bold">ID:</span> <?= $inventory['id'] ?></p>
                <p class="flex gap-2"><span class="font-bold">Product ID:</span> <?= $inventory['product_id'] ?></p>
                <p class="flex gap-2"><span class="font-bold">Product Name:</span>
                    <?= htmlspecialchars($inventory['product_name']) ?></p>
                <p class="flex gap-2"><span class="font-bold">Quantity:</span> <?= $inventory['quantity'] ?></p>
                <p class="flex gap-2"><span class="font-bold">Location:</span>
                    <?= htmlspecialchars($inventory['location']) ?></p>
            </div>

            <div class="card-actions justify-start mt-6">
                <a href="/inventory/edit/<?= $inventory['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="/inventory/destroy/<?= $inventory['id'] ?>" onclick="return confirm('Are you sure?')"
                    class="btn btn-error">Delete</a>
                <a href="/inventory" class="btn btn-ghost">Back to List</a>
            </div>
        </div>
    </div>
</div>

<?php require_once "views/partials/footer.view.php"; ?>