<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Crud;
use Illuminate\Support\Facades\Input;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cruds = Crud::all()->toArray();
        $cruds = DB::table('cruds')->paginate(5);
        //print_r($cruds);die;
        return view('crud.index',['cruds'=>$cruds] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $crud = new CRUDController();
        // echo "Hello";die;
        $crud = new Crud([
            'title' => $request->get('title'),
            'post' => $request->get('post')
        ]);
        $crud->save();
        return redirect('/crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crud = Crud::find($id);
        return view('crud.show', compact('crud','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud = Crud::find($id);
        return view('crud.edit', compact('crud','id'))->with('success','Post Updated Successfully!');
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
        $crud = Crud::find($id);
        $crud->title = $request->get('title');
        $crud->post = $request->get('post');
        $crud->save();
        return redirect('/crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Crud::find($id);
        $crud->delete();
        return redirect('/crud');
    }
    public function srch()
    {
        $searchterm = Input::get('searchinput');
        if($searchterm) {
            $products = DB::table('cruds');
            $results = $products->where('title', 'LIKE', '%'.$searchterm.'%')
            ->orwhere('post', 'LIKE', '%'.$searchterm.'%')
            ->get();
            return view('crud.search')->with('abc', $results);
        }
    }
    public function mains()
    {
        //$cruds = Crud::all()->toArray();
        $cruds = DB::table('cruds')->paginate(5);
        //print_r($cruds);die;
        return view('crud.mains',['cruds'=>$cruds] );
    }
}
