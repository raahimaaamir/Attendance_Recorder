<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo e(auth()->user()->fullname); ?></h1>

    <h2>Your Attendance Records</h2>
    <table>
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Presence</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($attendance->class->id); ?></td>
                    <td><?php echo e($attendance->class->starttime); ?></td>
                    <td><?php echo e($attendance->class->endtime); ?></td>
                    <td><?php echo e($attendance->isPresent ? 'Present' : 'Absent'); ?></td>
                    <td><?php echo e($attendance->comments); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views/student/index.blade.php ENDPATH**/ ?>