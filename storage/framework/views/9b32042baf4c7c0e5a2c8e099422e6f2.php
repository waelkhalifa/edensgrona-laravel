<?php $__env->startSection('title', $aboutSettings->title . ' - Edens Gröna'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Header Section -->
    <div class="container content-space-t-1">
        <div class="w-lg-75 text-center mx-lg-auto">
            <div class="mb-3">
                <h1 class="display-3" style="color: var(--mygreen);"><?php echo e($aboutSettings->title); ?></h1>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($aboutSettings->subtitle): ?>
                    <p class="lead mt-3"><?php echo e($aboutSettings->subtitle); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    <div class="mx-auto" style="max-width: 25rem; border-top: var(--mygreen) 1px solid;"></div>

    <!-- Main Content -->
    <div class="container content-space-1">
        <div class="justify-content-lg-between about-us-p" id="about-us-p">
            <div class="about-us-img" id="div1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($aboutSettings->image_path): ?>
                    <img src="<?php echo e(Storage::url($aboutSettings->image_path)); ?>" alt="<?php echo e($aboutSettings->title); ?>">
                <?php else: ?>
                    <img src="/assets/img/about-us-image.jpeg" alt="Edensgrona">
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="p-5 text-start">
                <div class="f-color about-content">
                    <?php echo $aboutSettings->content; ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<style>
    .about-content p {
        margin-bottom: 1rem;
    }

    .about-content h2,
    .about-content h3 {
        color: var(--mygreen);
        margin-top: 1.5rem;
        margin-bottom: 1rem;
    }

    .about-content ul,
    .about-content ol {
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .about-content a {
        color: var(--mygreen);
        text-decoration: underline;
    }

    .about-content a:hover {
        color: var(--mygreen-dark);
    }

    .about-us-img img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/waelkhalifa/Sites/edensgrona/resources/views/about.blade.php ENDPATH**/ ?>