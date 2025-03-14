<?php require_once "views/partials/header.view.php"; ?>
<div class="p-20">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Add New Product</h1>

        <form action="/products/store" method="POST" class="form-control w-full max-w-lg">
            <div class="mb-4"></div>
            <label class="label">
                <span class="label-text">Name:</span>
            </label>
            <input type="text" name="name" required class="input input-bordered w-full">
    </div>

    <div class="mb-4">
        <label class="label">
            <span class="label-text">Description:</span>
        </label>
        <textarea name="description" class="textarea textarea-bordered w-full h-24"></textarea>
    </div>

    <div class="mb-4">
        <label class="label"></label>
        <span class="label-text">SKU:</span>
        </label>
        <input type="text" name="sku" required class="input input-bordered w-full">
    </div>

    <div class="mb-4">
        <label class="label">
            <span class="label-text">Price:</span>
        </label>
        <input type="number" step="0.01" name="price" required class="input input-bordered w-full">
    </div>

    <div class="mb-4">
        <label class="label">
            <span class="label-text">Category:</span>
        </label>
        <input type="text" name="category" required class="input input-bordered w-full">
    </div>

    <div class="mt-6">
        <button type="submit" class="btn btn-primary">Create Product</button>
        <a href="/products" class="btn btn-ghost ml-2">Back to List</a>
    </div>
    </form>
</div>
</div>
<?php require_once "views/partials/footer.view.php"; ?>