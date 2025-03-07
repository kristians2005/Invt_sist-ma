<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Users</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
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
</body>
</html>