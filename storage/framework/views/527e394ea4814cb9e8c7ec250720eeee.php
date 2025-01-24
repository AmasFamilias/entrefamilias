
 





<?php
$classes = 'block w-full px-4 py-2 text-start text-sm leading-5 text-white bg-amber-500 
            hover:bg-amber-600 focus:outline-none focus:bg-amber-600 transition duration-150 ease-in-out';

$classes .= ($active ?? false) 
    ? ' font-nexabold border-2 border-amber-500 rounded-lg relative' 
    : ' font-nexalight';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

    <?php if($active ?? false): ?>
        <span class="absolute bottom-0 left-0 h-1 w-full bg-amber-500"></span>
    <?php endif; ?>
</a>


<?php /**PATH C:\Users\SergioOviedoVarela\Desktop\entrefamilias\resources\views/components/dropdown-link.blade.php ENDPATH**/ ?>