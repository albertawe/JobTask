<?php if($crud->hasAccess('update')): ?>
<a href="/receivemore/<?php echo e($entry->getKey()); ?>" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-ban"></i>Receive More</a>
<?php endif; ?>