<?php require_once "views/partials/header.view.php"; ?>

<div class="container mx-auto p-20">

    <h1 class="text-3xl font-bold text-center mb-6">Users</h1>

    <div class="flex justify-center mb-4">
        <a href="users/create" class="btn btn-primary">
            Create User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th class="text-base">Name</th>
                    <th class="text-base">Email</th>
                    <th class="text-base">Role</th>
                    <th class="text-base">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <div
                                class="badge badge-sm <?php echo $user['roles'] === 'Worker' ? 'badge-primary' : 'badge-warning' ?>">
                                <?php echo htmlspecialchars($user['roles']); ?>
                            </div>
                        </td>
                        <td><a href="users/edit?id=<?php echo $user['id']; ?>" class="link link-primary">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "views/partials/footer.view.php"; ?>