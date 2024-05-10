<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <style>
        .ratio {
            font-size: 20px;
            margin-top: 20px;
            padding: 10px;
            width: fit-content;
            text-align: center;
            border-radius: 5px;
        }

        .green {
            background-color: green;
            color: white;
        }

        .red {
            background-color: red;
            color: white;
        }
    </style>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            // Calculate total absents and presents
            let totalAbsents = 0;
            let totalPresents = 0;

            // Loop through each record to calculate absents and presents
            document.querySelectorAll('tbody tr').forEach(row => {
                let presence = row.querySelector('td:nth-child(2)').textContent;
                if (presence === 'Absent') {
                    totalAbsents++;
                } else {
                    totalPresents++;
                }
            });

            // Calculate the attendance ratio
            let totalStudents = totalAbsents + totalPresents;
            let ratio = (totalPresents / totalStudents) * 100;

            // Display the attendance ratio
            let ratioElement = document.createElement('div');
            ratioElement.classList.add('ratio');
            ratioElement.textContent = `Attendance Ratio: ${ratio.toFixed(2)}%`;
            if (ratio > 75) {
                ratioElement.classList.add('green');
            } else {
                ratioElement.classList.add('red');
            }
            document.body.appendChild(ratioElement);
        });
    </script>
</head>
<body>
    <h1>Student Attendance</h1>

    <h2><?php echo e($student->fullname); ?>'s Attendance</h2>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Presence</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($record->created_at->format('Y-m-d')); ?></td>
                <td><?php echo e($record->isPresent ? 'Present' : 'Absent'); ?></td>
                <td><?php echo e($record->comments); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Laravel\example-app\resources\views/student.blade.php ENDPATH**/ ?>