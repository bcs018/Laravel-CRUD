<h1>Atualizar Livro</h1>

<a href="{{route('livros.list')}}">Home</a>
<br><br><br>

<form action="{{route('livros.update')}}" method="post">
    @csrf

    <input type="hidden" name="id" value="{{$livro->id}}">

    Nome do Livro: <br>
    <input type="text" name="nome_livro" value="{{$livro->nome}}"> <br><br>

    Categoria do Livro: <br>
    <input type="text" name="categoria" value="{{$livro->categoria}}"><br><br>

    Autor do Livro: <br>
    <input type="text" name="autor" value="{{$livro->autor}}"><br><br>

    Livro é ebook? <br>
    <input type="radio" name="ebook" id="ebookt" value="1" <?php echo($livro->ebook=='1')?'checked':'' ?> ><label for="ebookt">SIM</label>  <br>
    <input type="radio" name="ebook" id="ebookf" value="0" <?php echo($livro->ebook=='0')?'checked':'' ?>><label for="ebookf">NÂO</label>  <br><br>
    
    Tamanho do arquivo: <br>
    <input type="number" name="tamanho_arq" value="{{$livro->tamanho_arquivo}}"><br><br>
    
    Peso do arquivo: <br>
    <input type="number" name="peso" value="{{$livro->peso}}"><br><br>

    Selecione a pessoa responsável: <br>
    <select name="pessoa">
        @foreach ($list as $item)
            <option <?php echo($item->id==$livro->pessoa_id)?'selected':'' ?> value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select>
    <br><br>

    <input type="submit" value="Cadastrar">
</form>
