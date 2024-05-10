<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
</head>
<body>

    <h2>Your Classes</h2>
    <ul>
        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <p>Class ID: <?php echo e($class->id); ?></p>
                <p>Start Time: <?php echo e($class->starttime); ?></p>
                <p>End Time: <?php echo e($class->endtime); ?></p>
                <p>Credit Hours: <?php echo e($class->credit_hours); ?></p>
                <p>Teacher: <?php echo e($class->teacher->fullname); ?></p>

                <h3>Attendance Records</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Presence</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $class->attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($attendance->student->fullname); ?></td>
                                <td><?php echo e($attendance->isPresent ? 'Present' : 'Absent'); ?></td>
                                <td><?php echo e($attendance->comments); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>


<?php /**PATH C:\Laravel\example-app\resources\views/teacher/index.blade.php ENDPATH**/ ?>