<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Country;
use App\Models\Auth\User;


class CountryController extends Controller
{
    
    public function index()
    {
        return view('backend.country.index');
    }

    public function create()
    {
        return view('backend.country.create');
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = Country::get();
            return DataTables::of($data)
                ->addColumn('action', function($data){                       
                    $button = '<a href="'.route('admin.country.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>';
                    return $button;
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
                    
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);       

        $add = new Country;

        $add->name=$request->name;
        $add->description=$request->description;        
        $add->order=$request->order;
        $add->status=$request->status;

        $add->save();

        return redirect()->route('admin.country.index')->withFlashSuccess('Added Successfully');  
    }

    public function edit($id)
    {
        $country = Country::where('id',$id)->first();              

        return view('backend.country.edit',[
            'country' => $country
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        $update = new Country;

        $update->name=$request->name;
        $update->description=$request->description;        
        $update->order=$request->order;
        $update->status=$request->status;

        Country::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.country.index')->withFlashSuccess('Updated Successfully');                      

    }
    
    public function destroy($id)
    {        
        $data = Country::findOrFail($id);
        $data->delete();   
    }


}
