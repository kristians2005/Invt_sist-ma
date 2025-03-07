<!DOCTYPE html>
<html lang="lv">

<?php require_once "views/partials/header.view.php"; ?>

<body>
    <?php require_once "views/partials/navbar.view.php"; ?>
    <h1 class="text-2xl text-center font-bold">Login</h1>

    <form action="/authenticate" class="w-full flex justify-center" method="POST">
        <div class="grid bg-base-300 w-[300px] gap-2 p-3">
            <input type="email" id="email" name="email"
                class="input input-bordered <?php echo isset($error['email']) ? 'input-error' : ''; ?>"
                value="<?php echo $email ?? ''; ?>" required title="Jāievada epasts, kas ietver @ zīmi"
                placeholder="Email">

            <input type="password" id="password" name="password"
                class="input input-bordered <?php echo isset($error['password']) ? 'input-error' : ''; ?>" required
                placeholder="Password">

            <div>
                <?php if (isset($error)): ?>
                    <ul>
                        <?php foreach ($error as $key => $value): ?>
                            <li class="text-red-500 m-2 text-xs italic"><?php echo $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</body>

</html>