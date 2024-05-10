<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
</head>
<body>
    <h1>Attendance Records</h1>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Attendance Status</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($record->student ? $record->student->fullname : 'Unknown'); ?></td>
                    <td><?php echo e($record->isPresent ? 'Present' : 'Absent'); ?></td>
                    <td><?php echo e($record->comments); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views/teacher/attendance.blade.php ENDPATH**/ ?>