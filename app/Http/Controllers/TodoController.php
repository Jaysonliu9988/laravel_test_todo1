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
        $result = Todo::all(['id', 'name', 'description', 'due_date', 'is_complete']);
        return $this->success($result, "todos");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->only(['name','description','due_date','is_complete']);
        $result = Todo::create($params);
        $result->timestamps = false;


        if (!$result) {
            return $this->fail('data error');
        }
        return $this->success($result,"todo");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Todo::find($id,['id','name','description','due_date','is_complete']);
        return $this->success($result, "todo");
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
        $todo = Todo::find($id, ['id','name', 'description', 'due_date', 'is_complete']);
        if (!$todo) {return $this->fail('not found');}
        $todo->timestamps = false;
        $todo->update($request->all());
        return $this->success($todo, 'todo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
        {
            return Todo::destroy($id);
        }
}
