<?php require_once "views/partials/header.view.php"; ?>
<div class="min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-3xl text-center font-bold mb-8">Create User</h1>

    <form action="/users/store" class="w-full flex justify-center" method="POST">
           
        <div class="grid bg-base-300 w-[350px] gap-4 p-6 rounded-lg shadow-lg">
            <input type="text" id="name" name="name"
                class="input input-bordered input-md <?php echo isset($error['name']) ? 'input-error' : ''; ?>"
                value="<?php echo $name ?? ''; ?>" required pattern="[a-zA-Z]{2,50}"
                title="Ludzū ievadiet vārdu kurā nav skaitļi , un ir no 2-50 burti" placeholder="Name">

            <input type="email" id="email"
                class="input input-bordered input-md <?php echo isset($error['email']) ? 'input-error' : ''; ?>"
                name="email" required value="<?php echo $email ?? ''; ?>"
                title="Jāievada epasts, kas ietver @ zīmi un .com" placeholder="Email">

            <input type="password"
                class="input input-bordered input-md <?php echo isset($error['password']) ? 'input-error' : ''; ?>"
                id="password" name="password" required minlength="8" value="<?php echo $password ?? ''; ?>"
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" placeholder="Password"
                title="Parolei jābūt vismaz 8 simbolus garai, jāiekļauj viens lielais burts, viens mazais burts, viens cipars un viens īpašais simbols.">

            <input type="password"
                class="input input-bordered input-md <?php echo isset($error['password']) ? 'input-error' : ''; ?>"
                name="password_confirmation" id="password_confirmation" required
                value="<?php echo $password_confirmation ?? ''; ?>" placeholder="Confirm Password"
                title="Lūdzu ievadiet paroli vēlreiz, lai apstiprinātu.">

                <div class="mb-4">
            <select id="roles"  name="roles" class="border rounded w-full py-2 px-3">
                <option value="Worker" >Worker</option>
                <option value="Admin" >Admin</option>
            </select>
        </div>

            <div>
                <?php if (isset($error)): ?>
                    <ul>
                        <?php foreach ($error as $key => $value): ?>
                            <li class="text-error text-sm italic"><?php echo $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary btn-md mt-2 w-full">Create User</button>
        </div>
    </form>
</div>
<?php require_once "views/partials/footer.view.php"; ?>