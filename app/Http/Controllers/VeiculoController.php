<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VeiculoController extends Controller
{
    /**
     * Exibe uma lista de todos os veículos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Veiculo::all();
    }

    /**
     * Exibe detalhes de um veículo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($id === 'find') {
            return $this->find($request->q);
        }

        $veiculo = Veiculo::find($id);
        if (!$veiculo) {
            return response()->json(['erro' => 'Veiculo não encontrado'], 404);
        }

        return $veiculo;
    }

    /**
     * Retorna os veículos de acordo com o termo passado no parâmetro
     * 
     * @param string $q
     * 
     * @return \Illuminate\Http\Response
     */
    public function find($q)
    {
        if (intval($q)) {
            return Veiculo::where('ano', $q)->get();
        }

        return Veiculo::where('marca', 'like', '%' . $q . '%')
            ->orWhere('veiculo', 'like', '%' . $q . '%')
            ->orWhere('descricao', 'like', '%' . $q . '%')
            ->get();
    }

    /**
     * Salva um novo veículo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensagens = [
            'veiculo.required' => 'O campo `veiculo` é obrigatório',
            'marca.required' => 'O campo `marca` é obrigatório',
            'ano.required' => 'O campo `ano` é obrigatório',
            'ano.numeric' => 'O campo `ano` deve ser numérico',
            'descricao.required' => 'O campo `descricao` é obrigatório',
            'vendido.boolean' => 'O campo `vendido` deve ser true ou false'
        ];

        $validador = Validator::make($request->all(), [
            'veiculo' => 'required',
            'marca' => 'required',
            'ano' => 'required|numeric',
            'descricao' => 'required',
            'vendido' => 'boolean',
        ], $mensagens);

        if ($validador->fails()) {
            return response()->json($validador->errors()->all(), 500);
        }

        $validado = $validador->validated();

        return Veiculo::create($validado);
    }

    /**
     * Atualiza os dados do veículo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);
        if (!$veiculo) {
            return response()->json(['erro' => 'Veiculo não encontrado'], 404);
        }

        $mensagens = [
            'ano.numeric' => 'O campo `ano` deve ser numérico',
            'vendido.boolean' => 'O campo `vendido` deve ser true ou false'
        ];

        $validador = Validator::make($request->all(), [
            'ano' => 'numeric',
            'vendido' => 'boolean',
        ], $mensagens);

        if ($validador->fails()) {
            return response()->json($validador->errors()->all(), 500);
        }

        $veiculo->fill($request->input());
        $veiculo->save();

        return $veiculo;
    }

    /**
     * Exclui o veículo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $veiculo = Veiculo::find($id);
        if (!$veiculo) {
            return response()->json(['erro' => 'Veiculo não encontrado'], 404);
        }

        $veiculo->delete();
    }

    /**
     * Exibe o formulário de criação de veículo
     */
    public function create()
    {
        return view('veiculo.formulario');
    }

    /**
     * Exibe o formulário de edição de veículo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);
        if (!$veiculo) {
            abort(404, 'Veiculo não encontrado');
        }

        return view('veiculo.formulario', ['veiculo' => $veiculo]);
    }

    public function listar()
    {
        $veiculos = Veiculo::all();
        return view('veiculo.lista', ['veiculos' => $veiculos]);
    }

    public function salvar(Request $request)
    {
        if (!empty($request->id)) {
            $veiculo = Veiculo::find($request->id);
        }

        if (!$veiculo) {
            return $this->store($request);
        }

        return $this->update($request, $veiculo->id);
    }
}
