@if ($crud->hasAccess('update'))
<a href="/receivemore/{{$entry->getKey()}}" class="btn btn-xs btn-default" target="_blank"><i class="fa fa-ban"></i>Receive More</a>
@endif