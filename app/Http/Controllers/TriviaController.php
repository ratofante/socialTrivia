<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trivia;

class TriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //3 PREGUNTAS RANDOM CON SELECT
        $preguntas = Trivia::select('pregunta', 'respuesta', 'opcion_1', 'opcion_2','opcion_3')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->toArray();

        //10 PREGUNTAS RANDOM FUNCIONA 
        /*$preguntas = Trivia::all()
            ->random(10)
            ->toArray();
        var_dump($preguntas);    
        */

        //Select ALL from trivia FUNCIONA
        /*$preguntas = DB::table('trivia')->get();
        */
        var_dump($preguntas);
        return view('trivia.trivia', [
            'preguntas' => $preguntas
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
