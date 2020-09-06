@extends('layouts.app')
@section('extra-js')
 {!! NoCaptcha::renderJs() !!}
@endsection

@section('content')

<div class="container">
	<h1>Créer un sujet</h1>
	<hr>
	<form action=" {{ route('topics.store')}}" method="POST">
     {{csrf_field()}}
     <div class="form-group">
     	<label for="title">Titre</label>
     	<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
     	@error('title')
     	<div class="invalid-feedback">{{ $errors->first('title') }}</div>
     	@enderror
     </div>
     <div class="form-group">
     	<label for="content">Description</label>
     	<textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" row="5"></textarea>
     	@error('content')
     	<div class="invalid-feedback">{{ $errors->first('content') }}</div>
     	@enderror
     </div>
     <div class="form-group">
     	{!! NoCaptcha::display() !!}
     	@if ($errors->has('g-recaptcha-response'))
        <span class="help-block">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
       </span>
       @endif
        </div>

     <button type="submit" class="btn btn-primary">Ajouter ce sujet</button>
	</form>
</div>
@endsection