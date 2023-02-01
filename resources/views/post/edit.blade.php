@extends('layouts.app')
@section('content')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
			<li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit Post</li>
		</ol>
	</nav>

	<div class="card">
		<div class="card-body ">
			<h4>Edit Post</h4>
			<hr>
			<form action="{{ route('post.update',$post->id) }}" id="formUpdate" method="post" enctype="multipart/form-data">
				@csrf
				@method('put')
			</form>
				<div class="mb-3">
					<label for="title" class="form-label">Post Title</label>
					<input type="text" name="title"
						class="form-control @error('title') is-invalid @enderror" 
						value="{{ old('title',$post->title ) }}" id="title" form="formUpdate"
					>
					@error('title')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="mb-3">
					<label for="category" class="form-label">Select Category</label>
					<select type="text" name="category" value="{{ old('category') }}"
						class="form-select @error('category') is-invalid @enderror" 
						 id="category" form="formUpdate"
					>
					@foreach($post->category::all() as $category)
						<option 
						value="{{ $category->id }}" {{ $category->id == old('category')? 'selected':'' }}>
						{{ $category->title }}
						</option>
					@endforeach
						
					</select>
					@error('category')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div>
					<div class="mb-2 d-flex">
						@foreach($post->photos as $photo)
							<div class=" position-relative me-2">
								<img src="{{ asset('storage/'.$photo->name) }}" height="100">
								<form action="{{ route('photo.destroy',$photo->id) }}" class="d-inline-block" method="post" >
									@csrf @method('delete')
									<button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">
										<i class="bi bi-trash3"></i>
									</button>
								</form>
							</div>
						@endforeach
					</div>
					<div class="mb-3">
						<label for="photos" class="form-label">Post Photo</label>
						<input type="file" name="photos[]"
							class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror"  
							 id="photos" multiple 
							 form="formUpdate"
						>
						@error('photos')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						@error('photos.*')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
				</div>

				<div class="mb-3">
					<label for="description" class="form-label">Post Description</label>
					<textarea type="text" name="description"
						class="form-control @error('description') is-invalid @enderror" 
						 id="description" rows="10"  form="formUpdate"
					>{{ old('description',$post->description) }}</textarea>
					@error('description')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex">
							@isset($post->featured_image)
								<img src="{{ asset("storage/".$post->featured_image) }}" class="  me-3 rounded shadow" height="70">
							@endisset
							<div class="">
								<label for="featured_image" class="form-label">Featured Image</label>
								<input type="file" name="featured_image"
									class="form-control @error('featured_image') is-invalid @enderror" 
									 id="featured_image" form="formUpdate"
								>
								@error('featured_image')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<button class="btn btn-sm py-3 px-4 btn-primary" form="formUpdate">Update Post</button>
				</div>
				
		</div>
	</div>
@endsection