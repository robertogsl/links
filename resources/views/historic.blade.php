@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Histórico') }}</div>
                    <div class="card-body">
                        <div class="container">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Ultima Alteração por</th>
                                <th>Ultima Alteração em</th>
                            </tr>
                            @foreach ($historics as $historic)
                                <tr>
                                    <td>{{ $historic->id }}</td>
                                    <td>{{ $historic->user->name }}</td>
                                    <td>{{ $historic->updated_at->format('d/m/y') }}</td>
                                    <td><button>Visualizar Payload</button></td>
                                </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection