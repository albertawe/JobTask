@if ($crud->hasAccess('update'))
<a href="/showimage/{{$entry->getKey()}}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-ban"></i>show image</a>
@endif