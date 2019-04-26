<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $clientes;

    public function __construct(Clientes $clientes)
    {
        $this->middleware('auth');
        $this->clientes = $clientes;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lista_tudo = $this->clientes->orderBy('created_at', 'DESC')->paginate(4);

        return view('inicio', compact('lista_tudo'));
    }

    public function cadastro(){
        return view('cadastro');
    }
    public function cadastroApply(Request $request){
        $cadastro = $request->all();

        $this->validate($request, $this->clientes->rules);

        $nameFile = null;

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $cadastro['image'] = $nameFile;

            $upload = $request->image->storeAs('avatar', $nameFile);

            if(!$upload){
                return redirect()->back();
            }
        }

        $insert = $this->clientes->create($cadastro);

        if($insert){
            return redirect()->back()->with(['msg' => 'Cadastrado com sucesso.']);
        }else{
            return redirect()->back()->with(['msg' => 'Ocorreu um erro inesperado.']);
        }
    }

    public function detalhes($id){
        $user = $this->clientes->find($id);

        return view('detalhes', compact('user'));
    }

    public function deletar($id){
        $deletar = $this->clientes->destroy($id);

        if($deletar){
            return redirect()->back()->with(['msg' => 'Deletado com sucesso.']);
        }else{
            return redirect()->back()->with(['msg' => 'Ocorreu um erro inesperado.']);
        }
    }

    /*public function pesquisar(Request $request){
        
        $busca = $request['pesquisa'];

        $enviar = $this->clientes->where('nome','LIKE', "%$busca%")->get();

        return view('inicio', compact('enviar'));
    }*/

    public function alterar($id){
        $alterar = $this->clientes->find($id);

        return view('alterar', compact('alterar'));
    }

    public function updateProfile(Request $request){
        $dataForm = $request->all();
        $id = $dataForm['id'];

       $this->validate($request, $this->clientes->edit_rules);

        $nameFile = null;

        if(isset($dataForm['image'])){

            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $dataForm['image'] = $nameFile;

            $upload = $request->image->storeAs('avatar', $nameFile);

            if(!$upload){
                return redirect()->back();
            }
        }

        $update = $this->clientes->find($id)->update($dataForm);

        if($update){
            return redirect()->back()->with(['msg' => 'Salvado com sucesso.']);
        }else{
            return redirect()->back()->with(['msg' => 'Ocorreu um erro inesperado.']);
        }
        
    }
}
