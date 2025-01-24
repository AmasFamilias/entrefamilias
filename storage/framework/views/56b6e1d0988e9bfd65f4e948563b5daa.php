<div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('filtrar-vacantes', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4172606289-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">
                Nuestras Oportunidades Disponibles
            </h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $vacantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vacante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600" href="<?php echo e(route('vacantes.show', $vacante->id)); ?>">
                                <?php echo e($vacante->titulo); ?>

                            </a>
                            <p class="text-base text-gray-600 mb-1">
                                <?php echo e($vacante->entidad); ?>

                            </p>
                            <p class="text-xs font-bold text-gray-600 mb-1">
                                <?php echo e($vacante->categoria->descripcion); ?>

                            </p>
                            <p class="font-bold text-xs text-gray-600">
                                Último día para Postularse:
                                <span class="font-normal"><?php echo e($vacante->ultimo_dia->format('d/m/Y')); ?></span>
                            </p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center" 
                                href="<?php echo e(route('vacantes.show', $vacante->id)); ?>">
                                Ver Oportunidad
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="p-3 text-center text-sm text-gray-600">No hay Oportunidades aún</p>                    
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div class="my-10">
                <?php echo e($vacantes->links('pagination::tailwind')); ?>

            </div>
            
        </div>
    </div>
</div>
<?php /**PATH C:\Users\SergioOviedoVarela\Desktop\entrefamilias\resources\views/livewire/home-vacantes.blade.php ENDPATH**/ ?>