<?php if($crud->hasAccess('clone')): ?>
	<a href="javascript:void(0)" onclick="cloneEntry(this)" data-route="<?php echo e(url($crud->route.'/'.$entry->getKey().'/clone')); ?>" class="btn btn-xs btn-default" data-button-type="clone"><i class="fa fa-clone"></i> Clone</a>
<?php endif; ?>




<?php $__env->startPush('after_scripts'); ?> <?php if($crud->request->ajax()): ?> <?php $__env->stopPush(); ?> <?php endif; ?>
<script>
	if (typeof cloneEntry != 'function') {
	  $("[data-button-type=clone]").unbind('click');

	  function cloneEntry(button) {
	      // ask for confirmation before deleting an item
	      // e.preventDefault();
	      var button = $(button);
	      var route = button.attr('data-route');

          $.ajax({
              url: route,
              type: 'POST',
              success: function(result) {
                  // Show an alert with the result
                  new PNotify({
                      title: "Entry cloned",
                      text: "A new entry has been added, with the same information as this one.",
                      type: "success"
                  });

                  // Hide the modal, if any
                  $('.modal').modal('hide');

                  if (typeof crud !== 'undefined') {
                    crud.table.ajax.reload();
                  }
              },
              error: function(result) {
                  // Show an alert with the result
                  new PNotify({
                      title: "Cloning failed",
                      text: "The new entry could not be created. Please try again.",
                      type: "warning"
                  });
              }
          });
      }
	}

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('cloneEntry');
</script>
<?php if(!$crud->request->ajax()): ?> <?php $__env->stopPush(); ?> <?php endif; ?>