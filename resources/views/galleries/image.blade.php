<div class="grid">
@foreach ($galleries as $gallery)
  <div class="grid-item">
    {!! Form::open(['route' => array('galleries.destroy', $gallery->id),'method' => 'delete']) !!}
      {!! Form::submit('X', array('class' => 'close', "onclick" => "return confirm('are you sure?')")) !!}
      {!! link_to(route('galleries.edit', $gallery->id), 'Edit', ['class' => 'glyphicon glyphicon-pencil']) !!}
    {!! Form::close() !!}
    <div class="grid-item-content">
      {!! $gallery->tittle !!}
      <img src="/upload_images/{!! $gallery->image !!}" width="100%" height="90%">
    </div>
  </div>
@endforeach
</div>
