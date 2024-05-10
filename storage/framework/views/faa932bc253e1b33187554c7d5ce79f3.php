<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <?php if(auth()->check()): ?>
        <h1>Welcome, <?php echo e(auth()->user()->fullname); ?></h1>
    <?php else: ?>
        <h1>Welcome, Guest</h1>
    <?php endif; ?>

    <h2>Your Attendance</h2>
    <ul>
        <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong>Session ID:</strong> <?php echo e($record->classid); ?><br>
                <strong>Presence:</strong> <?php echo e($record->isPresent ? 'Present' : 'Absent'); ?><br>
                <strong>Comments:</strong> <?php echo e($record->comments); ?><br>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views/student/dashboard.blade.php ENDPATH**/ ?>