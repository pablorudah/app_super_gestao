
@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- Se o cadastro foi concluído imprime mensagem de sucesso --}}
            {{-- {{ $message ?? ''}} --}}

            <div style="width: 30%; margin-left: auto; margin-right: auto; ">
                <form method="POST" action="{{ route('produto.store') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="border-black">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }} 
                    
                    <input type="text" name="descricao" value="{{ old('descricao') }}" placeholder="Descricao" class="border-black">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    
                    <input type="text" name="peso" value="{{ old('peso') }}" placeholder="Peso" class="border-black">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    
                    <select name="unidade_id">
                        <option>-- Selecione a Unidade de Medida --</option>
                            @foreach ($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option> 
                            @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    
                    <button type="submit" class="border-black">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
@endsection