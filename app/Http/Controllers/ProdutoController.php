<?php 
namespace App\Http\Controllers; //obrigatorio a definicao do namespace do diretorio q contem as classes q vamos extender

use App\Http\Controllers\Controller; //chamando a classe extendida
use App\Http\Requests\ProdutoRequest; //classe de validacao
use Illuminate\Support\Facades\DB; //classe de comunicacao com o BD
use Request;
use Validator;
use App\Produtos; 
use App\Categoria;

//classe do nosso controller que por padrao tem que extender as regras padrao de todo controller 
class ProdutoController extends Controller
{
	//funcao construtora, nesse caso verificamos se existe o login
    public function __construct()
    {
        $this->middleware('autorizador'); //invocamos o middleware q verifica o login
    }
	
	public function lista() //lista os produtos
	{
		//$produtos = DB::select('select * from produtos'); //funcao DB manipula a base de dados
		$produtos = Produtos::all(); //usando a classe model Produto com o metodo padrao all que faz select pra nos

		//retornando a view listagem.php (nao precisa por a extensao) e disponibilizando o select produtos pra view
		return view('listagem') -> with('produtos', $produtos); 	
	}

	public function mostra($id){ //dados do produto; a funcao ja reconhece por padrao q o parametro sera passado pela url
		//$produto = DB::select('select * from produtos where id = ?', [$id]); //funcao DB manipula a base de dados
		$produto = Produtos::find($id); //fazendo select passando a clausula where usando funcao find
		//dd($produto);
		//return view('detalhes_produto') -> with('produto', $produto[0]); //passando a primeira posicao do array obtido na consulta
		return view('detalhes_produto') -> with('produto', $produto);
	}

	public function remover($id){ //remover produto; a funcao ja reconhece por padrao q o parametro sera passado pela url
		$produto = Produtos::find($id); //fazendo select passando a clausula where usando funcao find
		$produto->delete(); //efetuando a remocao do produto
		return redirect('/produtos');
		//return redirect()->action('ProdutoController@lista'); // assim tambem funciona
	}

	public function novo_produto(){ //exibe formulario para add novo produto
		$titulo = "Cadastrar Novo Produto";
		$acao = "/produtos/adicionaProduto";
		$categorias = Categoria::all(); //pegando as categorias
		return view('form_novo_produto',compact("titulo","categorias", "acao")); //chamando o form cadastro passanto os parametros

		//return view('form_novo_produto')->with('categorias', Categoria::all()); //ja faz um select de todas as categorias
	}

	public function adicionaProduto(ProdutoRequest $request){ //confirma inclusao de novo produto no BD recebendo validacao como parametro
		//return view('produtoAdicionado') -> with('nome', $nome);
		/*
		$parametros = Request::all(); //pegando todos os parametros passados pelo POST
		$produto = new Produtos($parametros); //instanciando um obj da classe q manipula o BD
		$produto->save(); //fazendo o insert no BD
		
		//fazendo validacao simples
		$validacao = Validator::make(
			['nome' => Request::input('nome')], //instanciando o elemento a validar
			['nome' => 'required|min:3'] //especificando a condicao, neste caso campo obrigatorio com minimo de 3 caracteres
		);

		//testando a validacao
		if ($validacao->fails()) {
			return redirect('/produtos/novo'); //volta ao formulario
		}
		
		Produtos::create(Request::all()); //faz a mesma coisa q as 3 linhas acima
		*/
		Produtos::create($request->all()); //faz o insert aplicando as regras de validacao do ProdutoRequest.php
		return redirect('/produtos')->withInput(); //após inserir, redireciona para a rota de listagem de produtos e faz uma requisição nova ao servidor
		//withInput envia para a requisição do redirect os parametros da requisicao atual
	}

	public function editarProduto($id){
		$titulo = "Editar Produto";
		$produto = Produtos::find($id); //pegando o produto
		$categorias = Categoria::all(); //pegando as categorias
		$acao = "/produtos/atualizaProduto"; //acao do form
		return view('form_novo_produto',compact("titulo","produto","categorias", "acao")); //chamando o form cadastro passanto os parametros
	}

	public function atualizaProduto(ProdutoRequest $request, $id){// validando os valores e pegando o ID
		//NAO FUNCIONOU

		$dados = $request->all(); //pegando os dados do form
		$produto_Atualizar = Produtos::find($id); //pegando o produto a atualizar
		$update = $produto_Atualizar->update($dados); //atualizando
		//redirecionando de acordo com o resultado do update
		if ($update) {
	    //Flash::message('Atualizado com sucesso!');
			return redirect('/produtos'); //redireciona para a listagem
		}else{
			return redirect('/produtos/edita/'.$id);
		}
	}
}