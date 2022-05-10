<div class="max-w-3xl mx-auto my-10">
    <div class="space-y-4">
        <h1 class="text-2xl font-black text-gray-800">Table CRUD Laravel</h1>
        <?php if($formVisible): ?>
            <?php if($formVisible === 'edit'): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('students.edit', [])->html();
} elseif ($_instance->childHasBeenRendered('l3049787802-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3049787802-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3049787802-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3049787802-0');
} else {
    $response = \Livewire\Livewire::mount('students.edit', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3049787802-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php else: ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('students.create', [])->html();
} elseif ($_instance->childHasBeenRendered('l3049787802-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3049787802-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3049787802-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3049787802-1');
} else {
    $response = \Livewire\Livewire::mount('students.create', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3049787802-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endif; ?>
        <?php else: ?>
            <button wire:click="create" class="btn btn-primary">New</button>
        <?php endif; ?>
    </div>
    <hr class="my-6">
    <div class="space-y-6">
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <div class="flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">          
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>                
                    </svg> 
                    <label><?php echo e(session('message')); ?></label>
                </div>
            </div>
        <?php endif; ?>
        <div class="grid grid-cols-2 gap-2">
            <select wire:model="paginate" class="select select-bordered max-w-max">
                <option>5</option> 
                <option>10</option> 
                <option>15</option>
            </select>
            <input wire:model="search" type="search" placeholder="Search..." class="input input-bordered">
        </div>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>NIS</th> 
                        <th>Name</th> 
                        <th>Handle</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th class="align-baseline"><?php echo e($loop->iteration); ?></th> 
                            <td>
                                <div class="avatar">
                                    <div class="w-12 h-12 mask mask-hexagon">
                                        <img class="w-full h-full object-cover" src='<?php echo e(asset("storage/{$student->photo}")); ?>'>
                                    </div>
                                </div>
                            </td> 
                            <td class="align-baseline"><?php echo e($student->nis); ?></td> 
                            <td class="align-baseline"><?php echo e($student->name); ?></td>
                            <td class="align-baseline">
                                <button wire:click="edit(<?php echo e($student->id); ?>)" class="btn btn-warning">Edit</button>
                                <button wire:click="destroy(<?php echo e($student->id); ?>)" class="btn btn-error">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5">Not Found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo e($students->links()); ?>

    </div>
</div><?php /**PATH C:\xampp\htdocs\wirecrud\resources\views/livewire/students/index.blade.php ENDPATH**/ ?>