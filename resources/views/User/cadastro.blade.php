@extends('Tamplate.main')

@section('title', 'Cadastro de credencial')

@section('content')


    @if (Session::has('msg-error'))
        <div class="container-fluid" style="justify-content: center;" id="card-alert">
            <div class="container" style="width: 330px; height:100px; margin-top:100px; margin-bottom:100px;">

                <div class="alert alert-danger" id="danger">
                    {{ Session::get('msg-error') }}
                </div>
            </div>
        </div>
    @endif


    @if (Session::has('msg-success'))
        <div class="container-fluid" style="justify-content: center;" id="card-alert">
            <div class="container" style="width: 330px; height:100px; margin-top:100px; margin-bottom:100px;">

                <div class="alert alert-success" id="succes">
                    {{ Session::get('msg-success') }}
                </div>
            </div>
        </div>
    @endif





    <div class="container-fluid" id="card-login">
        <h1 class=" text-center">Cadastrar Credenciais
        </h1>
        <div class="container">
            <div class="d-flex justify-content-center">

                <div class="card t-card" style="width: 28rem;">

                    <div class="card-body">
                        <form action="{{ route('post.cadastro') }}" method="POST">

                            @csrf
                            <img src="{{ asset('img/logo.jpg') }}" class="img-logo img" alt="...">



                            <div class="row g-3">

                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control t-input" id="email"
                                        placeholder="name@example.com" value="{{ old('email') }}">
                                    <label for="email"></i>Email</label>
                                    @error('email')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control t-input" id="password"
                                        placeholder="name@example.com" value="{{ old('password') }}">
                                    <label for="password"></i>Senha</label>
                                    @error('password')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="button" id="showSenha" value="Mostrar senha" class="btn"
                                        style="border: none;" />
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="cliente_id" class="form-control t-input" id="cliente_id"
                                        placeholder="name@example.com" value="{{ old('cliente_id') }}">
                                    <label for="cliente_id"></i>Cliente ID</label>
                                    @error('cliente_id')
                                        <span class="danger text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="row g-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="cliente_secreto" class="form-control t-input"
                                            id="cliente_secreto" placeholder="name@example.com"
                                            value="{{ old('cliente_secreto') }}">
                                        <label for="cliente_secreto"></i>Cliente Secreto</label>
                                        @error('cliente_secreto')
                                            <span class="danger text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="mercado_id" class="form-control t-input" id="mercado_id"
                                            placeholder="name@example.com" value="{{ old('mercado_id') }}">
                                        <label for="mercado_id"></i>Mercado ID</label>
                                        @error('mercado_id')
                                            <span class="danger text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" id="submit-form-login"
                                        class="btn btn-lg btn-custom">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('javascript')
<script src="{{ asset('js/ocultar.js') }}"></script>
@endpush