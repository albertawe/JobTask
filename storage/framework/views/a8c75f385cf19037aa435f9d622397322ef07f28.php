<?php if($crud->hasAccess('update')): ?>
<a href="/openchat/<?php echo e($entry->getKey()); ?>" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-ban"></i>Reply chat</a>
<?php endif; ?>