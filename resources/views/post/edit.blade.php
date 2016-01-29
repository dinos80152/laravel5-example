@extends('layout')

@section('content')

<form method="POST" action="{{ route('posts.update') }}">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
</form>

@endsection