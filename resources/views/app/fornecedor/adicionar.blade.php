
@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar Novo</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- Se o cadastro foi concluído imprime mensagem de sucesso --}}
            {{ $message ?? ''}}

            <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                <form method="POST" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">

                    @csrf
                    <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="border-black">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    
                    <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site" class="border-black">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    
                    <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" class="border-black">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    
                    <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="Email" class="border-black">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    
                    <button type="submit" class="border-black">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection