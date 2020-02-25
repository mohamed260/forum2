<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="#">
                <?php echo e($thread->creator->name); ?>

                </a> Posted:
                <?php echo e($thread->title); ?>

                </div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e($thread->body); ?>


                </div>
            </div>
        </div>
    </div>
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">

        <?php $__currentLoopData = $thread->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('threads.reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php if(auth()->check()): ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="<?php echo e($thread->path() . '/replies'); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                <textarea name="body" id="body" class="form-control" placeholder="Have Something To Say?"></textarea>
                </div>

                <button type="submit" class="btn btn-success form-control">Post</button>
                
            </form>
        </div>
    </div>
    <?php else: ?>
    <p class="text-center">Please <a href="<?php echo e(route('login')); ?>"> Sign In </a> To Participate In This Discussion.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NOUR\Desktop\forum\resources\views/threads/show.blade.php ENDPATH**/ ?>