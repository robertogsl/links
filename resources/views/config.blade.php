@extends('layouts.app')
@section('content')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea#payload',
    menubar: false
  });
</script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <form action="/remoteConfig/config/{{ $config->id }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="form-group">
                            <textarea id="payload" name="payload">{{ $config->payload }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">Salvar configuração</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection