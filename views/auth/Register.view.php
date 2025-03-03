<!DOCTYPE html>
<html lang="lv">

<?php require_once "views/partials/header.view.php"; ?>

<body>
    <h1>Register</h1>
    <form action="/registerUser" method="POST">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="Várds" name="Várds" required pattern="[a-zA-Z]{2,50}" title="Ludzū ievadiet vārdu kurā nav skaitļi , un ir no 2-50 burti">

        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required title="Jāievada epasts, kas ietver @ zīmi un .com">

        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required minlength="15" 
        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" 
        title="Parolei jābūt vismaz 15 simbolus garai, jāiekļauj viens lielais burts, viens mazais burts, viens cipars un viens īpašais simbols.">
        <br>

        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

</body>

</html>