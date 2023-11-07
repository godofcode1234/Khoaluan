
@extends('layouts.app')

@section('content')

  @include('canbo.table', ['canbo' => $canbo])
  
  @include('canbo.form')
  
@endsection