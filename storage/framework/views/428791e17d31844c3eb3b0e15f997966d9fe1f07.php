<?php if($crud->hasAccess('update')): ?>
<a href="/receiveless/<?php echo e($entry->getKey()); ?>" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-ban"></i>Receive Less</a>
<?php endif; ?>