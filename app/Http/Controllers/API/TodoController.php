<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $todos = Todo::all();

        return response()->json( $todos );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        $todo = Todo::create( $request->only( 'title', 'completed' ) );

        return response()->json( $todo );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Todo $todo ) {
        return response()->json( $todo );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Todo $todo
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Todo $todo ) {
        $todo->update( $request->only( [ 'title', 'completed' ] ) );

        return response()->json( $todo );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Todo $todo ) {
        /* highlight-start */
        $todo->delete();

        return response()->json( $todo );
        /* highlight-end */
    }
}
