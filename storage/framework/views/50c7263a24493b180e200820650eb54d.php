<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>

    <form method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo csrf_field(); ?>

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required autocomplete="new-password">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
        </div>

        <div>
            <label>Role:</label>
            <div>
                <input type="radio" id="teacher" name="role" value="teacher">
                <label for="teacher">Teacher</label>
            </div>
            <div>
                <input type="radio" id="student" name="role" value="student">
                <label for="student">Student</label>
            </div>
            <div>
                <input type="radio" id="admin" name="role" value="admin">
                <label for="admin">Admin</label>
            </div>
        </div>

        <div>
            <label for="class_name">Class Name:</label>
            <input type="text" name="class_name" id="class_name" value="<?php echo e(old('class_name')); ?>" required>
        </div>

        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views//signup.blade.php ENDPATH**/ ?>