<?php $__env->startSection('admin-content'); ?>

<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-2xl font-bold">Welcome, Admin</span>
</div>
<div class="bg-white m-2 p-2 text-black rounded-xl">
    <span class="text-xl font-bold">FFB Daily Yield for March 2022</span>
    
        <div class="bg-yellow-400 text-black p-2 rounded m-3" id="status_message">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>&nbsp;Huhuhu
        </div>
    
        <div class="m-2">
        <a href="<?php echo e(route('daily_yield-add')); ?>" class=" p-2 bg-green-600 hover:bg-green-500 rounded-lg text-white shadow-lg">+ Add New Entry</a>
    </div>
    <div class="m-2">
        <table class="border-collapse border border-green-900 w-full">
            <thead>
                <tr class="bg-gray-200 p-3 font-bold">
                    <td width="10%" class="border border-blue-900 p-3 display-none">Date</td>
                    <td width="10%" class="border border-blue-900 p-3">Estate Abbreviation</td>
                    <td width="20%" class="border border-blue-900 p-3">Today FFB (MT)</td>
                    <td width="20%" class="border border-blue-900 p-3 display-none">Today Budget FFB (MT)</td>
                    <td width="20%" class="border border-blue-900 p-3">Action</td>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td colspan=5>Empty List <br>(contact administrator if you think this is an error)</td>
                    </tr>
                
                
                    <tr class="h-30 border border-black hover:bg-cyan-50 text-center min-h-full">
                        <td class="border border-gray-300 p-3 px-5 display-none"></td>
                        <td class="border border-gray-300 p-3 px-5"></td>
                        <td class="border border-gray-300 p-3 px-5"></td>
                        <td class="border border-gray-300 p-3 px-5 display-none"></td>
                        <td class="border border-gray-300 p-3 px-5 ">
                            <div class="inline-flex">
                            
                            <a href=""><button class="bg-green-500 hover:bg-green-400 rounded-lg p-2 m-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </button></a>
                            
                            <form action="" method="GET">
                                <?php echo csrf_field(); ?> 
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 rounded-lg p-2 m-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </form>
                            
                            <form action="" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
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
                
                

            </tbody>
        </table>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/umarqayyum/Desktop/main/web dev/pasb-statistic/resources/views/admin/main.blade.php ENDPATH**/ ?>