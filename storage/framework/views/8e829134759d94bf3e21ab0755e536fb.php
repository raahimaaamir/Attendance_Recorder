<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
</head>
<body>
    <h1>Attendance</h1>

    <?php if(isset($class)): ?>
    <p>Class ID: <?php echo e($class->id); ?></p>
    <p>Class Name: <?php echo e($class->name); ?></p>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('attendance.submit')); ?>">
        <?php echo csrf_field(); ?>
        <?php if($class->teacher): ?>
    <p>Teacher: <?php echo e($class->teacher->fullname); ?></p>
<?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($student->fullname); ?></td>
                    <td>
                        <input type="hidden" name="student_ids[]" value="<?php echo e($student->id); ?>">
                        <input type="checkbox" name="is_present[]" value="1">
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views/attendance.blade.php ENDPATH**/ ?>