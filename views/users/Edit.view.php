<?php require_once "views/partials/header.view.php"; ?>
<div class="pt-20">
    <h1 class="text-3xl font-bold text-center mb-6">Edit User</h1>
    <div class="card w-96 bg-base-100 shadow-xl mx-auto p-8">
        <form action="/users/update?id=<?php echo $user['id']; ?>" method="POST">

            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"
                    class="input input-bordered w-full" required pattern="[a-zA-Z]{2,50}"
                    title="Lūdzu ievadiet vārdu kurā nav skaitļi, un ir no 2-50 burti">
            </div>

            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
                    class="input input-bordered w-full" required title="Jāievada epasts, kas ietver @ zīmi un .com">
            </div>

            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text">Role</span>
                </label>
                <select id="roles" name="roles" class="select select-bordered w-full">
                    <option value="Worker" <?php echo $user['roles'] == 'Worker' ? 'selected' : ''; ?>>Worker</option>
                    <option value="Admin" <?php echo $user['roles'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>

            <div class="flex justify-end gap-2">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <form action="/users/destroy?id=<?php echo $user['id']; ?>" method="POST" class="inline">
            <button type="submit" class="btn btn-error">Delete</button>
        </form>
    </div>
</div>
</div>
<?php require_once "views/partials/footer.view.php"; ?>