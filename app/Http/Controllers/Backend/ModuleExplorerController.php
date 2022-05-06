<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Module;

class ModuleExplorerController extends Controller
{
    public function index()
    {
        $installed_module = self::get_installed_module();
        $explorer_module = self::get_explorer_module();
        return view('backend.module_explorer.index',[
            'installed_modules' => $installed_module,
            'explorer_modules' => $explorer_module
        ]);
    }


    public static function get_installed_module()
    {
        $modules = Module::getByStatus(1);
        $outArray = [];
        foreach ($modules as $mod){

            try{
                $moduleJson =  file_get_contents($mod->getPath().'/'.'module.json');
            }catch (\Exception $exception){
                $moduleJson = null;
            }
            if($moduleJson){
                $moduleMetaArray = json_decode($moduleJson);
            }else{
                $moduleMetaArray = null;
            }

            $outModule = [
                'module_name' => $mod->getName(),
                'path' => $mod->getPath(),
                'meta_details' => $moduleMetaArray,
                'status' => ''
            ];
            array_push($outArray,$outModule);
        }
        return $outArray;
    }


    public static function get_explorer_module()
    {
        $modules = Module::getByStatus(0);
        $outArray = [];
        foreach ($modules as $mod){

            try{
                $moduleJson =  file_get_contents($mod->getPath().'/'.'module.json');
            }catch (\Exception $exception){
                $moduleJson = null;
            }
            if($moduleJson){
                $moduleMetaArray = json_decode($moduleJson);
            }else{
                $moduleMetaArray = null;
            }

            $outModule = [
                'module_name' => $mod->getName(),
                'path' => $mod->getPath(),
                'meta_details' => $moduleMetaArray,
                'status' => ''
            ];
            array_push($outArray,$outModule);
        }
        return $outArray;
    }


    public function install(Request $request)
    {
        \Artisan::call('module:migrate '.$request->module_name);
        \Artisan::call('module:seed --class=PermissionSeederTableSeeder '.$request->module_name);
        
        $module_name = $request->module_name;
        $module = Module::find($module_name);
        $module->enable();
        return back();
    }

    public function uninstall(Request $request)
    {
        \Artisan::call('module:migrate-rollback '.$request->module_name);
        \Artisan::call('module:seed --class=PermissionRemovalSeederTableSeeder '.$request->module_name);
        $module_name = $request->module_name;
        $module = Module::find($module_name);
        $module->disable();
        return back();
    }

}
