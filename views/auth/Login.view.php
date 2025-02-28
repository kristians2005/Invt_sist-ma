<!DOCTYPE html>
<html lang="lv">

<?php require_once "views/partials/header.view.php"; ?>

<body>
    <h1>Login</h1>

    <form action="/authenticate" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
</form>
</body>

</html>