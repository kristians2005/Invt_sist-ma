<?php require_once "views/partials/header.view.php"; ?>

<div class="pt-20">

<h1 class="text-3xl text-white font-bold text-center text-gray-800 mb-6">Users</h1>

<div class="flex justify-center mb-4">
    <a href="users/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create User
    </a>
</div>

<div class="overflow-x-auto">
    <table class="table w-full shadow-md rounded-lg overflow-hidden">
    <thead>
        <tr>
        <th class="bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Name</th>
        <th class="bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Email</th>
        <th class="bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Role</th>
        <th class="bg-gray-200 text-left text-gray-600 font-bold uppercase text-sm">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr class="hover:bg-gray-100">
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['roles']); ?></td>
            <td><a href="users/edit?id=<?php echo $user['id']; ?>" class="text-blue-500 hover:underline">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
</div>

<?php require_once "views/partials/footer.view.php"; ?>
