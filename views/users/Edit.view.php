<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Edit User</h1>
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <form action="/users/update/<?php echo $user['id']; ?>" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="roles" class="block text-gray-700 font-bold mb-2">Role</label>
                <input type="text" id="roles" name="roles" value="<?php echo htmlspecialchars($user['roles']); ?>" class="border rounded w-full py-2 px-3">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</body>
</html>