<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Country;
use App\Models\City;
use App\Models\Auth\User;


class CityController extends Controller
{
    
    public function index()
    {
        return view('backend.city.index');
    }

    public function create()
    {
        $countries = Country::where('status','Enabled')->get();

        return view('backend.city.create',[
            'countries' => $countries
        ]);
    }

    public function getdetails(Request $request)
    {
        if($request->ajax())
        {
            $data = City::get();
            return DataTables::of($data)
                ->addColumn('action', function($data){                       
                    $button = '<a href="'.route('admin.city.edit',$data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3 mr-3"><i class="fas fa-edit"></i> Edit </a>';
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
                ->addColumn('country', function($data){
                    $country = Country::where('id',$data->country)->first();
                    // dd($country);
                    if($country == null){
                        $country = '<span class="badge badge-danger">Not Set</span>';
                        return $country;
                    }
                    elseif($country->status == 'Disabled'){
                        $country = '<span class="badge badge-warning">Country Disabled ('.$country->name.')</span>';
                        return $country;
                    }
                    else{
                        $country = $country->name;
                        return $country;
                    }    
                    
                    
                })
                    
                ->rawColumns(['action','status','country'])
                ->make(true);
        }
        return back();
    }

    public function store(Request $request)
    {        
        // dd($request);

        $add = new City;

        $add->name=$request->name;
        $add->country=$request->country;
        $add->status=$request->status;

        $add->save();

        return redirect()->route('admin.city.index')->withFlashSuccess('Added Successfully');  
    }

    public function edit($id)
    {
        $countries = Country::where('status','Enabled')->get();
        $city = City::where('id',$id)->first();              

        return view('backend.city.edit',[
            'city' => $city,
            'countries' => $countries
        ]);  
    }


    public function update(Request $request)
    {    
        // dd($request);

        $update = new City;

        $update->name=$request->name;
        $update->country=$request->country;
        $update->status=$request->status;

        City::whereId($request->hidden_id)->update($update->toArray());

        return redirect()->route('admin.city.index')->withFlashSuccess('Updated Successfully');                      

    }
    
    public function destroy($id)
    {        
        $data = City::findOrFail($id);
        $data->delete();   
    }


}
