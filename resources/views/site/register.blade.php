@extends('site.layouts.basico')

@section('titulo', 'Contato')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Crie Sua Conta</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto">
                <form action={{ route('site.register') }} method="POST">
                    @csrf
                    <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" value="{{ old('email') }}" name="email" placeholder="Usuário" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <input type="password" value="{{ old('senha') }}" name="senha" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    <button type="submit" class="borda-preta">Criar Conta</button>
                </form>

                {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/twitter.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(15) 99245-9438</span>
            <br><br>
            <span>pablorpribeiro@gmail.com</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection