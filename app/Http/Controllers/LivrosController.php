<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;

class LivrosController extends Controller
{
    public function showLivros(){
        $list = Livro::all();

        return view('index', ['list'=>$list]); 
    }

    public function showLivroTxt(Request $r){
        $list = Livro::all();
        $livro = DB::select (
                    DB::raw('
                        SELECT * FROM livros WHERE nome LIKE '.'"%'.$r->input('txt_livro').'%";
                    ')
        );
        return view('index', ['list'=>$list, 'livro'=>$livro]);
    }

    public function showLivro(Request $r){
        $list = Livro::all();
        $livro = Livro::where('id', $r->input('id_livro'))->get();

        return view('index', ['list'=>$list, 'livro'=>$livro]);
    }

    public function getLivro(Request $r){
        $list = Livro::where('id', )->get();
    }

    public function saveLivro(){
        $list = Pessoa::all();
        
        return view('cadastrar', ['list'=>$list]);
    }

    public function storeLivro(Request $r){
        if($r->filled('nome_livro') && $r->filled('categoria') && $r->filled('autor') && $r->filled('ebook') && $r->filled('pessoa')){
            $nome      = $r->input('nome_livro');
            $categoria = $r->input('categoria');
            $autor     = $r->input('autor');
            $ebook     = $r->input('ebook');
            $pessoa_id = $r->input('pessoa');
            $tamanho   = $r->input('tamanho_arq');
            $peso      = $r->input('peso');

            $livro = new Livro;

            $livro->nome              = $nome;
            $livro->categoria         = $categoria;
            $livro->autor             = $autor;
            $livro->ebook             = $ebook;
            $livro->pessoa_id         = $pessoa_id;
            $livro->tamanho_arquivo   = ($tamanho==''?0:$tamanho);
            $livro->peso              = ($peso==''?0:$peso);

            $livro->save();

            $list = Pessoa::all();

            return redirect()->route('livros.save', ['list'=>$list])->with('alert', 'Livro cadastrado com sucesso!');
        }
    }

    public function editLivro($id){
        $livro = Livro::find($id);
        $list = Pessoa::all();

        return view('atualizar', ['livro'=>$livro, 'list'=>$list]);
    }

    public function updateLivro(Request $r){
        if($r->filled('nome_livro') && $r->filled('categoria') && $r->filled('autor') && $r->filled('ebook') && $r->filled('pessoa')){
            $nome      = $r->input('nome_livro');
            $categoria = $r->input('categoria');
            $autor     = $r->input('autor');
            $ebook     = $r->input('ebook');
            $pessoa_id = $r->input('pessoa');
            $tamanho   = $r->input('tamanho_arq');
            $peso      = $r->input('peso');
            $id        = $r->input('id');

            $livro = Livro::find($id);

            $livro->nome              = $nome;
            $livro->categoria         = $categoria;
            $livro->autor             = $autor;
            $livro->ebook             = $ebook;
            $livro->pessoa_id         = $pessoa_id;
            $livro->tamanho_arquivo   = ($tamanho==''?0:$tamanho);
            $livro->peso              = ($peso==''?0:$peso);

            $livro->save();

            $list = Pessoa::all();

            return redirect()->route('livros.edit', ['id'=>$id])->with('alert', 'Livro atualizado com sucesso!');
        }
    }

    public function deleteLivro($id){
        $livro = Livro::find($id);
        $livro->delete();

        $list = Pessoa::all();

        return redirect()->route('livros.list', ['list'=>$list]);

    }
}
