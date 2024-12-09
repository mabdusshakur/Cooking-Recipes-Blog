@extends('layouts.app')
@section('content')
  @include('user.partials._banner')
  @include('user.partials._featuredRecipe')
  @include('user.partials._popularRecipe')
  @include('user.partials._popularAuthor')
@endsection