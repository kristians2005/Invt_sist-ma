<?php require_once "views/partials/header.view.php"; ?>
<h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Users</h1>
<div class="overflow-x-auto">
    <table class="min-w-full  shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr>
                <th class="py-3 px-6 bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Name</th>
                <th class="py-3 px-6 bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Email</th>
                <th class="py-3 px-6 bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Role</th>
                <th class="py-3 px-6 bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-4 px-6"><?php echo htmlspecialchars($user['name']); ?></td>
                    <td class="py-4 px-6"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td class="py-4 px-6"><?php echo htmlspecialchars($user['roles']); ?></td>
                    <td class="py-4 px-6">
                        <a href="users/edit?id=<?php echo $user['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require_once "views/partials/footer.view.php"; ?>