<?php if($crud->hasAccess('update')): ?>
<a href="/showimage/<?php echo e($entry->getKey()); ?>" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-ban"></i>show image</a>
<?php endif; ?>