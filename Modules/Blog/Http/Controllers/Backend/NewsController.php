<?php

namespace Modules\Blog\Http\Controllers\Backend;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DataTables;
use DB;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::backend.post.index');
    }    

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Post::get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                       
                    if(auth()->user()->can('edit blog posts')){
                        $button = '<a href="'.route('admin.post.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                    }else{
                        $button = '';
                    }
                    
                    if(auth()->user()->can('delete blog posts')){
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    }else{
                        $button .= '';
                    }
                    
                    return $button;
                   
                })   
                ->editColumn('status', function($data){
                    if($data->status == 'Enabled'){
                        $status = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $status = '<span class="badge badge-warning">Disabled</span>';
                    }   
                    return $status;
                })          
                ->editColumn('featured', function($data){
                    if($data->featured == 'Enabled'){
                        $featured = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $featured = '<span class="badge badge-warning">Disabled</span>';
                    }   
                    return $featured;
                })            
                ->rawColumns(['action','status','featured'])
                ->make(true);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::where('status','Enabled')->get();

        return view('blog::backend.post.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if($request->description == null){
            return back()->withErrors('Please Fill Description Section');
        }else{

            if($request->image == null){
                return back()->withErrors('Please Add an Image');
            }else{              

                $add = new Post;

                $add->name=$request->name; 
                $add->description=$request->description;        
                $add->place=$request->place;        
                $add->date=$request->date;        
                $add->time=$request->time;
                $add->image=$request->image;
                $add->status=$request->status;
                $add->featured=$request->featured;
                $add->order=$request->order;
                $add->save();

                return redirect()->route('admin.post.index')->withFlashSuccess('Added Successfully');  
            }
            
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
        $post = Post::where('id',$id)->first(); 
        $categories = Category::where('status','Enabled')->get();

        return view('blog::backend.post.edit',[
            'post' => $post,
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
        // dd($request);
        if($request->description == null){
            return back()->withErrors('Please Fill Description Section');
        }else{

            if($request->image == null){
                return back()->withErrors('Please Add an Image');
            }else{              

                $update = new Post;

                $update->name=$request->name; 
                $update->description=$request->description;        
                $update->place=$request->place;        
                $update->date=$request->date;        
                $update->time=$request->time;
                $update->image=$request->image;
                $update->status=$request->status;
                $update->featured=$request->featured;
                $update->order=$request->order;

                Post::whereId($request->hidden_id)->update($update->toArray());

                return redirect()->route('admin.post.index')->withFlashSuccess('Updated Successfully');  
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete(); 
    }
}
