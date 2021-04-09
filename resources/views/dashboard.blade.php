@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
    <!-- if para validar se usuário possui alguma aplicação já cadastrada -->
                        @if ($aplications && $id == 1)
                            @foreach ($aplications as $aplication)
                                <a href="#">{{ $aplication->name }}</a> <br>
                            @endforeach
                        @else
                            {{ __("You don't have any aplications registered!") }}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection