<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form method="POST" action= "<?php echo e(route('loginauth')); ?>">
        <?php echo csrf_field(); ?> <!-- CSRF token -->
        
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Login</button>
            <button><a href="<?php echo e(route('signup')); ?>">Sign Up</a></button>
    </form>
</body>
</html>
<?php /**PATH C:\Raahima University\Semester 4\WE Labs\HiraSajid(405562)_BSCS12B_Lab10\HiraSajid(405562)_BSCS12B_Lab10\example-app\resources\views/login.blade.php ENDPATH**/ ?>