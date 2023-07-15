
@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                <form method="POST" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="border-black">
                    <input type="text" name="site" placeholder="Site" class="border-black">
                    <input type="text" name="uf" placeholder="UF" class="border-black">
                    <input type="text" name="email" placeholder="Email" class="border-black">
                    <button type="submit" class="border-black">Consultar</button>
                </form>
            </div>
        </div>
    </div>
@endsection