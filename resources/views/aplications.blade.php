@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aplications') }}</div>

                    <div class="card-body">

                        <div class="container">
                            <table class="table">
                            @foreach ($aplications as $aplication)
                                <tr>
                                    <td>{{ $aplication->name }}</td>
                                    <td><a href="{{ url('remoteConfig/config', [$aplication->id]) }}"><button>Editar</button></a></td>
                                    <td><a href="{{ url('remoteConfig/historico', [$aplication->id]) }}"><button>Histórico</button></a></td>
                                </tr>
                            @endforeach
                            </table>
                            <a href="{{ url('/remoteConfig/cadastrar') }}"><button style="margin-left: 36%;">Cadastrar nova aplicação</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection