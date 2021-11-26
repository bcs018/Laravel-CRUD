<h1>Cadastro de livros</h1>

<a href="{{route('livros.list')}}">Home</a>
<br><br><br>

<form action="{{route('livros.add')}}" method="post">
    @csrf
    Nome do Livro: <br>
    <input type="text" name="nome_livro"> <br><br>

    Categoria do Livro: <br>
    <input type="text" name="categoria"><br><br>

    Autor do Livro: <br>
    <input type="text" name="autor"><br><br>

    Livro é ebook? <br>
    <input type="radio" name="ebook" id="ebookt" value="1"><label for="ebookt">SIM</label> <br>
    <input type="radio" name="ebook" id="ebookf" value="0"><label for="ebookf">NÂO</label> <br><br>
    
    Tamanho do arquivo: <br>
    <input type="number" name="tamanho_arq"><br><br>
    
    Peso do arquivo: <br>
    <input type="number" name="peso"><br><br>

    Selecione a pessoa responsável: <br>
    <select name="pessoa">
        @foreach ($list as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select>
    <br><br>

    <input type="submit" value="Cadastrar">
</form>