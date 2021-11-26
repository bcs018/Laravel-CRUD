<h2>Lista completa de Livros</h2>

@if (count($list) == 0)
    <h4>Não há livros cadastrados</h4>
@else 
    @foreach ($list as $item)
        <ul>
            <li> {{$item->nome}} <a href="{{route('livros.edit',["id"=>$item->id])}}">Editar</a> | <a onclick="return confirm('Deseja excluir este item?')" href="{{route('livros.delete',["id"=>$item->id]) }}">Excluir</a> </li>
        </ul>
    @endforeach
@endif

<hr>

<a  href="{{route('livros.save')}}"><button>Clique aqui para cadastrar</button></a>

<br><br><br><br>

<h3>Pesquisar</h3>
<form action="{{route('livros.show')}}" method="POST">
    @csrf
    Pesquisar livro por id: <br>
    <input type="number" name="id_livro"> <br><br>

    <input type="submit" value="Pesquisar">

</form>

<hr>

<form action="{{route('livros.search')}}" method="POST">
    @csrf
    Pesquisar livro por texto: <br>
    <input type="text" name="txt_livro"> <br><br>

    <input type="submit" value="Pesquisar">

</form>

<hr>

@if(isset($livro))
    @if (count($livro) == 0)
        <h4>Não há livros encontrados</h4>
    @else 
        @foreach ($livro as $item)
            <ul>
                <li> {{$item->nome}} <a href="{{route('livros.edit',["id"=>$item->id])}}">Editar</a> | <a onclick="return confirm('Deseja excluir este item?')" href="{{route('livros.delete',["id"=>$item->id]) }}">Excluir</a> </li>
            </ul>
        @endforeach
    @endif
@endif