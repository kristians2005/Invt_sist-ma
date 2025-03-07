<!DOCTYPE html>
<html lang="lv">

<?php require_once "views/partials/header.view.php"; ?>

<body>
    <?php require_once "views/partials/navbar.view.php"; ?>
    <h1 class=" text-2xl text-center font-bold">Register</h1>


    <form action="/registerUser" class="w-full flex justify-center " method="POST">

        <div class="grid bg-base-300 w-[300px] gap-2 p-3">


            <input type="text" id="name" name="name"
                class="input input-bordered <?php echo isset($error['name']) ? 'input-error' : ''; ?>"
                value="<?php echo $name ?? ''; ?>" required pattern="[a-zA-Z]{2,50}"
                title="Ludzū ievadiet vārdu kurā nav skaitļi , un ir no 2-50 burti" placeholder="Name">

            <input type="email" id="email"
                class="input input-bordered <?php echo isset($error['email']) ? 'input-error' : ''; ?>" name="email"
                required value="<?php echo $email ?? ''; ?>" title="Jāievada epasts, kas ietver @ zīmi un .com"
                placeholder="email">

            <input type="password"
                class="input input-bordered <?php echo isset($error['password']) ? 'input-error' : ''; ?>" id="password"
                name="password" required minlength="8" value="<?php echo $password ?? ''; ?>"
                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" placeholder="Password"
                title="Parolei jābūt vismaz 8 simbolus garai, jāiekļauj viens lielais burts, viens mazais burts, viens cipars un viens īpašais simbols.">

            <input type="password"
                class="input input-bordered <?php echo isset($error['password']) ? 'input-error' : ''; ?>"
                name="password_confirmation" id="password_confirmation" required
                value="<?php echo $password_confirmation ?? ''; ?>" placeholder="Confirm Password"
                title="Lūdzu ievadiet paroli vēlreiz, lai apstiprinātu.">

            <div>
                <?php if (isset($error)): ?>
                    <ul>
                        <?php foreach ($error as $key => $value): ?>
                            <li class="text-red-500 m-2 text-xs italic"><?php echo $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>



            <button type="submit" class="btn btn-primary">Register</button>
        </div>

    </form>

</body>

</html>