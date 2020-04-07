<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            <a href="<?php echo e(route('profile', $thread->creator)); ?>">
                            <?php echo e($thread->creator->name); ?>

                            </a> Posted:
                            <?php echo e($thread->title); ?>

                        </span>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $thread)): ?>
                            <form action="<?php echo e($thread->path()); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo e(method_field('DELETE')); ?>

                                <button type="submit" class="btn btn-link">Delete Thread</button>
                            </form>
                        <?php endif; ?>
                        
                    </div>
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
            <br>
            <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('threads.reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php echo e($replies->links()); ?>



            <?php if(auth()->check()): ?>
                <form method="POST" action="<?php echo e($thread->path() . '/replies'); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Have Something To Say?"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success form-control">Post</button>
                    
                </form>
            <?php else: ?>
            <p class="text-center">Please <a href="<?php echo e(route('login')); ?>"> Sign In </a> To Participate In This Discussion.</p>
            <?php endif; ?>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p>
                        This Thread Was Published <?php echo e($thread->created_at->diffForHumans()); ?> By 
                        <a href="#"><?php echo e($thread->creator->name); ?></a>, And Currently Has <?php echo e($thread->replies_count); ?> 
                        <?php echo e(str_plural('comment', $thread->replies_count)); ?> .
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NOUR\Desktop\forum\resources\views/threads/show.blade.php ENDPATH**/ ?>