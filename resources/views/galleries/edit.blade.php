@extends("layouts.application")

@section("content")

  <h3>Edit a Content</h3>

  {!! Form::model($gallery, ['route' => ['galleries.update', $gallery->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}

    @include('galleries.image-upload')

  {!! Form::close() !!}

@stop