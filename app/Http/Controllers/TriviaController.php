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


    public $trivia = [];


    public function index()
    {
        //3 PREGUNTAS RANDOM CON SELECT
        $preguntas = Trivia::select('pregunta', 'respuesta', 'opcion_1', 'opcion_2','opcion_3')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->toArray();

        $preguntas = $this->sortearOpciones($preguntas);

        //var_dump($preguntas);
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

    /******************
     * 
     * 
     * 
     * 
     * 
     */
    public function sortearOpciones($preguntas)
    {
        for($i=0; $i<count($preguntas); $i++)
        {
            $this->trivia[$i] = array(
                'pregunta' => $preguntas[$i]['pregunta'],
                'opciones' => array(
                    'opcion_1' => array(
                        'texto' => $preguntas[$i]['respuesta'],
                        'valor' => true
                    ),
                    'opcion_2' => array(
                        'texto' => $preguntas[$i]['opcion_1'],
                        'valor' => false
                    ),
                    'opcion_3' => array (
                        'texto' => $preguntas[$i]['opcion_2'],
                        'valor' => false
                    ),
                    'opcion_4' => array (
                        'texto' => $preguntas[$i]['opcion_3'],
                        'valor' => false
                    )
                )
            );
            shuffle($this->trivia[$i]['opciones']);
        } 
        return $this->trivia;      
    }
}
