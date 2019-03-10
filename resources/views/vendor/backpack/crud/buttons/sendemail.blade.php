@if ($crud->hasAccess('update'))
<a href="{{ Request::url().'/'.$entry->getKey() }}/sendemail" class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Confirm payment</a>
@endif