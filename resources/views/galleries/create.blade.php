@extends("layouts.application")

@section("content")

  <h3>Add new photo</h3>

  @if (count($errors) > 0)
  	<div class="alert alert-danger">
	  <strong>Ehem</strong> Ada masalah dengan inputan kamu.<br><br>
      <ul>
	    @foreach ($errors->all() as $error)
		  <li>{{ $error }}</li>
	    @endforeach
      </ul>
  	</div>
  @endif

  {!! Form::open(['route' => 'galleries.store', 'class' => 'form-horizontal', 'role' => 'form', 'files'=>true]) !!}

    @include('galleries.image-upload')

  {!! Form::close() !!}

@stop