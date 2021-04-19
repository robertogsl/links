@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <div class="container">
                            <table class="table">
                            @foreach ($aplications as $aplication)
                                <tr>
                                    <td>{{ $aplication->name }}</td>
                                    <td><a href="{{ url('remoteConfig/config') }}"><button>Editar</button></a></td>
                                </tr>
                            @endforeach
                            </table>
                            <a href="{{ url('/remoteconfig/cadastrar') }}"><button style="margin-left: 36%;">Cadastrar nova aplicação</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection