<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>



<?php
$classes = 'inline-flex items-center px-1 py-1 rounded-lg text-sm font-medium leading-5 
            transition duration-150 ease-in-out';

$classes .= ($active ?? false) 
    ? ' bg-amber-500 text-white underline font-bold border-2 border-amber-500 focus:outline-none 
       focus:bg-amber-600 font-nexabold' 
    : ' border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-amber-300 
       focus:outline-none focus:text-gray-700 focus:border-gray-300 font-nexalight';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH C:\Users\SergioOviedoVarela\Desktop\entrefamilias\resources\views/components/nav-link.blade.php ENDPATH**/ ?>