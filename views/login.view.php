<?php require 'partials/header.partial.php' ?>

<div class="login-screen">
    <form action="/login" class="login-form" method="post">
        <h1>Enter <span data-tooltip="420727">PIN</span> to login 👨‍💻</h1>
        <fieldset role="group">
            <input type="password" name="PIN" placeholder="Enter PIN">
            <input type="submit" value="Login">
        </fieldset>
        <?php if(isset($_SESSION['_flash']['pinerror'])): ?>
            <div style="color: red;  margin-bottom: 1rem;"><?= $pinErr ?></div>
        <?php endif ?>
    </form>
</div>

<?php require 'partials/footer.partial.php' ?>