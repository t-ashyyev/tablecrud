<form wire:submit.prevent='store' class="space-y-4" action="">
    <div class="grid grid-cols-2 gap-2">
        <div class="form-control">
            <label class="label">
                <span class="label-text">NIS</span>
            </label> 
            <input wire:model="nis" type="number" placeholder="NIS" class="input <?php $__errorArgs = ['nis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> input-bordered">
            <?php $__errorArgs = ['nis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <label class="label">
                    <span class="label-text-alt"><?php echo e($message); ?></span>
                </label>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Name</span>
            </label> 
            <input wire:model="name" type="text" placeholder="Name" class="input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> input-bordered">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <label class="label">
                    <span class="label-text-alt"><?php echo e($message); ?></span>
                </label>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            
            <?php if($photo): ?>
                <div class="avatar">
                    <div class="w-24 h-24 mask mask-hexagon">
                        <img class="w-full h-full object-cover" src="<?php echo e($photo->temporaryUrl()); ?>">
                    </div>
                </div>
            <?php endif; ?>
            <label class="btn btn-sm" for="photo">Upload Photo</label>
            <input class="absolute pointer-events-none opacity-0" type="file" wire:model="photo" id="photo">
        </div>
        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="text-sm"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <button class="btn btn-primary">Create</button>
    
    <button type="button" wire:click="$emit('closeForm')" class="btn">Cancel</button>
</form><?php /**PATH C:\xampp\htdocs\wirecrud\resources\views/livewire/students/create.blade.php ENDPATH**/ ?>