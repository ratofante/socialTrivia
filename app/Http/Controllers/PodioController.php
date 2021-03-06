<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podio;

class PodioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podio = Podio::select('username', 'resultado', 'created_at')
                    ->limit(10)
                    ->orderBy('resultado', 'desc')
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('podio.podio',[
            'podio' => $podio,
            'titulo' => 'Podio'
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
        Podio::create([
            'username' => $request->input('name'),
            'resultado' => $request->input('resultado')
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $podio = Podio::select('username', 'resultado', 'created_at')
                    ->where('user_id', '=', $id)
                    ->orderBy('resultado', 'desc')
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('podio.podio',[
            'podio' => $podio,
            'titulo' => 'Podio'
        ]);
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
