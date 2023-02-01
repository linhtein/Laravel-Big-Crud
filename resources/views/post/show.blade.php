@extends('layouts.app')
@section('content')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
			<li class="breadcrumb-item active" aria-current="page">Post Detail</li>
		</ol>
	</nav>

	<div class="card">
		<div class="card-body ">
			<h4>{{ $post->title }}</h4>
			<hr>
			<div class="mb-3">
				<span class="badge bg-secondary ">
					<i class="bi bi-grid me-1"></i>
					{{ $post->category->title }}
				</span>
				<span class="badge bg-secondary ">
					<i class="bi bi-person"></i>
					{{ $post->user->name }}
				</span>
				<span class="badge bg-secondary">
					<i class="bi bi-calendar"></i>
					{{ $post->created_at->format('d M Y') }}
				</span>
				<span class="badge bg-secondary">
					<i class="bi bi-clock"></i>
					{{ $post->created_at->format('h:i A ') }}
				</span>
			</div>

			@isset($post->featured_image)
				<img src="{{ asset("storage/".$post->featured_image) }}" class=" mb-3 rounded shadow" width="200" height="200">
			@endisset
			<p> {{  $post->description }}</p>

			@foreach($post->photos as $photo)
				<img src="{{ asset('storage/'.$photo->name) }}" height="100" class="mx-1">
			@endforeach
			
			<hr>
			<div class="d-flex justify-content-between align-items-center">
				<a href="{{ route('post.create') }}" class="btn btn-outline-primary me-1 px-3">Create Post</a>
				<a href="{{ route('post.index') }}" class="btn btn-primary px-3">All Posts</a>
			</div>
		</div>
	</div>
@endsection