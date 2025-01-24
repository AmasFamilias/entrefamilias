<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="w-full mx-auto overflow-hidden bg-white shadow-sm p-6 divide-y divide-gray-200">
        <!-- Contenedor para pantallas grandes y medianas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden hidden sm:block"
             style="background-image: url('<?php echo e(asset('images/home_manos.png')); ?>'); height: 75vh; background-size: cover;">
            <div class="flex items-center justify-center h-full w-full px-2 sm:px-4 lg:px-6">
                <div class="text-center">
                    <p class="font-museo300 text-2xl sm:text-2xl md:text-2xl lg:text-4xl leading-tight tracking-tight text-center text-white">
                        Tu comunidad para 
                        <span class="font-bold">
                            compartir, aprender 
                        </span> 
                    </p>
    
                    <p class="font-museo300 text-2xl sm:text-2xl md:text-2xl lg:text-4xl leading-tight tracking-tight text-center text-white">
                        <span class="font-bold">y conectar con familias</span>
                        afines a ti.
                    </p>
                    <div class="font-nexabold flex justify-center items-center py-6 sm:py-8 lg:py-12">
                        <a href="<?php echo e(route('register')); ?>" 
                           class="bg-amber-500 py-4 px-8 rounded-lg text-white uppercase underline text-center text-lg sm:text-xl md:text-2xl">
                            REGÍSTRATE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Contenedor para pantallas pequeñas -->
        <div class="relative bg-cover bg-center bg-no-repeat rounded-lg overflow-hidden sm:hidden"
             style="background-image: url('<?php echo e(asset('images/home_respon.png')); ?>'); height: 75vh; background-size: cover;">
            <div class="flex items-center justify-center h-full w-full px-2">
                <div class="text-center">
                    <p class="font-museo300 text-lg leading-tight tracking-tight text-center text-white">
                        Tu comunidad para 
                        <span class="font-bold">compartir, aprender</span>
                    </p>
    
                    <p class="font-museo300 text-lg leading-tight tracking-tight text-center text-white">
                        <span class="font-bold">y conectar con familias</span>
                        afines a ti.
                    </p>
                    <div class="flex justify-center items-center py-6">
                        <a href="<?php echo e(route('register')); ?>" 
                           class="bg-amber-500 py-3 px-6 rounded-lg text-white font-bold uppercase underline text-center text-base">
                            REGÍSTRATE
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('home-vacantes', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1982827111-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>       
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\SergioOviedoVarela\Desktop\entrefamilias\resources\views/home/index.blade.php ENDPATH**/ ?>