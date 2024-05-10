<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST" action="<?php echo e(route('login.authenticate')); ?>">
        <?php echo csrf_field(); ?>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views//login.blade.php ENDPATH**/ ?>