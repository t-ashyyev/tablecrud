<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <title>TABLECRUD</title>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>
    <div class="overflow-x-hidden relative min-h-screen">
        <nav class="bg-white py-4 border-b border-gray-100">
            <div class="container px-8 mx-auto">
                <a class="text-gray-800 uppercase tracking-wider text-xl font-bold" href="#"><span class="font-black text-primary">table</span>crud</a>
            </div>
        </nav>
        <?php echo e($slot); ?>

    </div>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\wirecrud\resources\views/layouts/app.blade.php ENDPATH**/ ?>