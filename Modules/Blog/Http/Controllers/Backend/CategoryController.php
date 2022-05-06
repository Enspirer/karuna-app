<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Blog\Entities\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::backend.category.index');
    }

    public function getdetails()
    {
        $category = Category::get();
        return Datatables::of($category)
            ->addColumn('action', function($row){

                if(auth()->user()->can('edit blog category')){
                    $btn1 = '<a href="'.route('admin.category.edit',$row->id).'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit </a>';
                }else{
                    $btn1 = '';
                }
                if(auth()->user()->can('delete blog category')){
                    $btn2 = ' <button type="button" name="delete" id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                }else{
                    $btn2 = '';
                }
                return $btn1.$btn2;
            })
            ->rawColumns(['action'])
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = Category::where('name',$request->name)->first(); 
        // dd($data);

        if( $data == null ){
                  
            $add = new Category;

            $add->image = $request->image;
            $add->name = $request->name;        
            $add->description = $request->description;
            $add->order = $request->order;
            $add->slug = $request->slug;
            $add->status = $request->status;

            $add->save();

            return redirect()->route('admin.category.index')->withFlashSuccess('Added Successfully');
             
        }else{
            return back()->withErrors('You Already Added This Category');
        } 
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $categories = Category::where('id',$id)->first(); 

        return view('blog::backend.category.edit',[
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $update = new Category;

        $update->image = $request->image;
        $update->name = $request->name;        
        $update->description = $request->description;
        $update->order = $request->order;
        $update->slug = $request->slug;
        $update->status = $request->status;

        Category::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.category.index')->withFlashSuccess('Upload Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete(); 
    }
}
