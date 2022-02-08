<?php $__env->startSection('content'); ?>
<div class="p-3 max-w-sm mx-auto my-2 bg-white rounded-xl shadow-xl items-center ">
    <p class="text-2xl font-bold">Administrator Login</p>
    
    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            E-Mail Address
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="enter an e-mail address">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-sm text-red"> <?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="my-4">    
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Password
            </label>
            <input class="w-full shadow appearance-none border-bottom rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="enter your password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-sm text-red"> <?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="bg-cyan-600 m-2 p-2 rounded hover:text-black hover:bg-cyan-400">Log Me In </button>
    </form>

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/umarqayyum/Desktop/main/web dev/pasb-statistic/resources/views/admin/login.blade.php ENDPATH**/ ?>