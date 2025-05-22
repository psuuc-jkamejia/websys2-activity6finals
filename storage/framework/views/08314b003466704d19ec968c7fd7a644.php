<!DOCTYPE html>
<html>
<head>
    <title>Weather Info</title>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
        }
        .card {
            padding: 20px;
            border: 1px solid #ddd;
            width: 30%;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h2>Weather Information</h2>
    <div class="container">
        <?php $__currentLoopData = $weatherData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weather): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <?php if(isset($weather['error'])): ?>
                    <p><strong><?php echo e($weather['city']); ?></strong></p>
                    <p style="color:red;"><?php echo e($weather['error']); ?></p>
                <?php else: ?>
                    <p><strong>City:</strong> <?php echo e($weather['city']); ?></p>
                    <p><strong>Temperature:</strong> <?php echo e($weather['temperature']); ?>°C</p>
                    <p><strong>Description:</strong> <?php echo e($weather['description']); ?></p>
                    <p><strong>Humidity:</strong> <?php echo e($weather['humidity']); ?>%</p>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\acer user\nino-waether-app\resources\views/weather.blade.php ENDPATH**/ ?>