<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $fichas = User::where('id', Auth::id())->first()->fichas()->get();

            return view('sheet.dashboard', [
                'fichas' => $fichas
            ]);
        }

        return redirect()->route('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ficha = new Ficha();

        $ficha->nome = $request->nomeDashboard;
        $ficha->user_id = Auth::id();
        $ficha->imagem_personagem = $request->imagemPersonagemDashboard;
        $ficha->imagem_dragao = $request->imagemMiniDragaoDashboard;

        $ficha->save();
        return redirect()->route('sheet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha $ficha)
    {
        $caminhos = DB::table('caminhos')->get();
        $classes = DB::table('classes')->get();
        $herancas = DB::table('herancas')->get();

        $caminho = null;
        $classe = null;
        $heranca = null;

        if ($ficha->caminho_id) {
            $caminho = DB::table('caminhos')->where('id', $ficha->caminho_id)->first();
        }

        if ($ficha->classe_id) {
            $classe = DB::table('classes')->where('id', $ficha->classe_id)->first();
        }

        if ($ficha->heranca_id) {
            $heranca = DB::table('herancas')->where('id', $ficha->heranca_id)->first();
        }

        $almas = $ficha->almas()->get();

        return view('sheet.ficha', [
            'ficha' => $ficha,
            'almas' => $almas,

            'caminhos' => $caminhos,
            'classes' => $classes,
            'herancas' => $herancas,

            'caminho' => $caminho,
            'classe' => $classe,
            'heranca' => $heranca
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha $ficha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ficha $ficha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha $ficha)
    {
        //
    }

    public function caminho(Request $request, Ficha $ficha)
    {
        $ficha->caminho_id = $request->caminho_id;
        $ficha->save();

        $caminho = DB::table('caminhos')->where('id', $request->caminho_id)->first();

        return json_encode($caminho);
    }

    public function classe(Request $request, Ficha $ficha)
    {
        $ficha->classe_id = $request->classe_id;
        $ficha->save();

        $classe = DB::table('classes')->where('id', $request->classe_id)->first();

        return json_encode($classe);
    }

    public function heranca(Request $request, Ficha $ficha)
    {
        $ficha->heranca_id = $request->heranca_id;
        $ficha->save();

        $heranca = DB::table('herancas')->where('id', $request->heranca_id)->first();

        return json_encode($heranca);
    }

    public function updatelife(Request $request, Ficha $ficha)
    {

        if (str_contains($request->vida_atual, '+') || str_contains($request->vida_atual, '-')) {
            $ficha->vida_atual += $request->vida_atual;
        } else {
            $ficha->vida_atual = $request->vida_atual;
        }

        if ($request->vida_max !== null) {
            $ficha->vida_max = $request->vida_max;
        }

        $ficha->save();

        $response = [
            'vida_atual' => $ficha->vida_atual,
            'vida_max' => $ficha->vida_max
        ];

        return json_encode($response);
    }

    public function updateawaken(Request $request, Ficha $ficha)
    {

        if (str_contains($request->despertado_atual, '+') || str_contains($request->despertado_atual, '-')) {
            $ficha->despertado_atual += $request->despertado_atual;
        } else {
            $ficha->despertado_atual = $request->despertado_atual;
        }

        if ($request->despertado_max !== null) {
            $ficha->despertado_max = $request->despertado_max;
        }

        $ficha->save();

        $response = [
            'despertado_atual' => $ficha->despertado_atual,
            'despertado_max' => $ficha->despertado_max
        ];

        return json_encode($response);
    }

    public function updateimage(Request $request, Ficha $ficha)
    {
        if ($request->imagem_personagem) {
            $ficha->imagem_personagem = $request->imagem_personagem;
            $ficha->save();
            $response['imagem_personagem'] = $ficha->imagem_personagem;
        } else if ($request->imagem_dragao) {
            $ficha->imagem_dragao = $request->imagem_dragao;
            $ficha->save();
            $response['imagem_dragao'] = $ficha->imagem_dragao;
        }

        return redirect()->route('sheet.show', ['ficha' => $ficha->id]);
    }

    public function updatedragon(Request $request, Ficha $ficha)
    {
        $ficha->dragao_nome = $request->dragao_nome;
        $ficha->dragao_elemento = $request->dragao_elemento;
        $ficha->save();

        $response['dragao_nome'] = $ficha->dragao_nome;
        $response['dragao_elemento'] = $ficha->dragao_elemento;

        return json_encode($response);
    }

    public function updatearma(Request $request, Ficha $ficha)
    {
        $ficha->arma_nome = $request->arma_nome;
        $ficha->arma_dano = $request->arma_dano;
        $ficha->arma_elemento = $request->arma_elemento;
        $ficha->save();

        $response['arma_nome'] = $ficha->arma_nome;
        $response['arma_dano'] = $ficha->arma_dano;
        $response['arma_elemento'] = $ficha->arma_elemento;

        return json_encode($response);
    }
}
