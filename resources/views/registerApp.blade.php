@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit an Aplication</h1>
        </div>
        <div class="row">
            <form action="/remoteconfig/cadastrar" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Name of the Aplication</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Aplication" value="{{ old('aplication') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection