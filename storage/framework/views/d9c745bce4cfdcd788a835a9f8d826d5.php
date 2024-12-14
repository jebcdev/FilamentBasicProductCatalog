<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Products'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">

        <header>
            <?php if ($__env->exists('products.partials.navbar')) echo $__env->make('products.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>

        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>


        
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\FilamentBasicProductCatalog\resources\views/products/layout/product-layout.blade.php ENDPATH**/ ?>