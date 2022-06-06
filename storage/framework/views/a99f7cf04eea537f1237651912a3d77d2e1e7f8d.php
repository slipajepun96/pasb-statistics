<?php $__env->startSection('admin-content'); ?>

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold">Welcome, Admin</span>
</div>
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-xl font-bold">FFB Daily Yield for March 2022</span>
    <?php if(session('status')): ?>
        <div class="bg-yellow-400 text-black p-2 rounded m-3" id="status_message">
            [INFO]<?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('delete')): ?>
    <div class="bg-red-400 text-black p-2 rounded m-3" id="status_message">
        <?php echo e(session('delete')); ?>

    </div>
    <?php endif; ?>
        <div class="m-2">
        <a href="<?php echo e(route('daily_yield-add')); ?>" class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg">+ Add New Entry</a> 
    </div>
    <div class="m-2 overflow-x-auto">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="20%" class="border border-blue-900 p-3 display-none">Date</td>
                    <td width="25%" class="border border-blue-900 p-3">Estate Abbreviation</td>
                    <td width="15%" class="border border-blue-900 p-3">Today FFB (MT)</td>
                    <td width="20%" class="border border-blue-900 p-3 display-none">Today Budget FFB (MT)</td>
                    <td width="20%" class="border border-blue-900 p-3">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php if($dailyyields->count()==0): ?>
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                <?php else: ?>
                <?php $__currentLoopData = $dailyyields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dailyyield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-3 px-5 display-none"><?php echo e($dailyyield->date); ?></td>
                        <td class="border border-gray-300 p-3 px-5"><?php echo e($dailyyield->estate->estate_name); ?></td>
                        <td class="border border-gray-300 p-3 px-5"><?php echo e($dailyyield->ffb_mt); ?></td>
                        <td class="border border-gray-300 p-3 px-5 display-none"><?php echo e($dailyyield->date); ?></td>
                        <td class="border border-gray-300 p-3 px-5 ">
                            <div class="inline-flex">
                            
                            
                            <form action="/admin/ffb/daily_yield/edit/<?php echo e($dailyyield->id); ?>" method="GET">
                                <?php echo csrf_field(); ?> 
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-2 m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </form>
                            
                            <form action="/admin/ffb/daily_yield/delete/<?php echo e($dailyyield->id); ?>" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
                                <?php echo csrf_field(); ?> 
                                <button type="submit" class="bg-red-500 hover:bg-red-400 rounded-lg p-2 m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </tbody>
        </table>
        
    </div>
    <div class="m-2">
        <?php echo e($dailyyields->links()); ?>

    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/umarqayyum/Desktop/main/web dev/pasb-statistic/resources/views/admin/main.blade.php ENDPATH**/ ?>