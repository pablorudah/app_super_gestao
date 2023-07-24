@if(isset($cliente->id))
    <form method="POST" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf
@endif
    
    <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome do Cliente" class="border-black">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }} <br>
    
    <button type="submit" class="border-black">Adicionar</button>
</form>