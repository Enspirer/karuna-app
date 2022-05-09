<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\Packages;

class PackagesController extends Controller
{    
    public function index()
    {
        return view('backend.package.index');
    }

    public function create()
    {
        return view('backend.package.create');
    }

    public function getDetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Packages::get();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                       
                    $button = '<a href="'.route('admin.package.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button;
                })
                ->addColumn('image', function($data){
                    $img = '<img src="'.uploaded_asset($data->image).'" style="width: 60%">';
                 
                    return $img;
                })              
                ->addColumn('status', function($data){
                    if($data->status == 'Enabled'){
                        $status = '<span class="badge badge-success">Enabled</span>';
                    }
                    else{
                        $status = '<span class="badge badge-danger">Disabled</span>';
                    }   
                    return $status;
                })
                    
                ->rawColumns(['action','status','image'])
                ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);
       
        if($request->image == null){
            return back()->withErrors('Please Select an Image');
        }else{

            $add = new Packages;

            $add->name=$request->name;
            $add->price=$request->price;
            $add->image=$request->image;        
            $add->user_id = auth()->user()->id;
            $add->order=$request->order;
            $add->status=$request->status;
            $add->save();

            return redirect()->route('admin.package.index')->withFlashSuccess('Added Successfully');
        }
    }

    public function edit($id)
    {
        $package = Packages::where('id',$id)->first();         

        return view('backend.package.edit',[
            'package' => $package
        ]);  
    }


    public function update(Request $request)
    {    
        if($request->image == null){
            return back()->withErrors('Please Select an Image');
        }else{

            $update = new Packages;

            $update->name=$request->name;
            $update->price=$request->price;
            $update->image=$request->image;        
            $update->user_id = auth()->user()->id;
            $update->order=$request->order;
            $update->status=$request->status;

            Packages::whereId($request->hidden_id)->update($update->toArray());

            return redirect()->route('admin.package.index')->withFlashSuccess('Updated Successfully');  

        }
    
    }


    public function destroy($id)
    {        
        $data = Packages::findOrFail($id);
        $data->delete();   
    }

}
