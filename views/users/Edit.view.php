<?php require_once "views/partials/header.view.php"; ?>
<h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Edit User</h1>
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <form action="/users/update?id=<?php echo $user['id']; ?>" method="POST">

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>"
                class="border rounded w-full py-2 px-3" required pattern="[a-zA-Z]{2,50}"
                title="Lūdzu ievadiet vārdu kurā nav skaitļi, un ir no 2-50 burti">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
                class="border rounded w-full py-2 px-3" required title="Jāievada epasts, kas ietver @ zīmi un .com">
        </div>

        <div class="mb-4">
            <label for="roles" class="block text-gray-700 font-bold mb-2">Role</label>
            <select id="roles" name="roles" class="border rounded w-full py-2 px-3">
                <option value="Worker" <?php echo $user['roles'] == 'Worker' ? 'selected' : ''; ?>>Worker</option>
                <option value="Admin" <?php echo $user['roles'] == 'Admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
    <form action="/users/destroy?id=<?php echo $user['id']; ?>" method="POST">
        <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700">Delete</button>
</div>
<?php require_once "views/partials/footer.view.php"; ?>