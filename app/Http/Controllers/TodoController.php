<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
// use App\Http\Resources\TodosResource;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all();
        // return TodosResource::collection(Todo::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Todo::create([
            'name' => 'Example Todo',
            'description' => 'This is an example Todo',
            'due_date' => '04/04/2022',
            'is_complete' => 'false',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        // return Todo::find($id);
        return \response()->json([
            'todos' => [
                'id' => $todo->id,
                'description' => $todo->description,
                'due_date' => $todo->due_date,
                'is_complete' => (boolean)$todo->false,
            ],
            'success' => 'true',
            'error' => 'null'
        ]);
        // return new TodosResource($todo);
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
