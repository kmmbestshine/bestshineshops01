<?php

namespace App\Http\Controllers\backend;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\RoleModule;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       // dd('module list');
        $this->checkpermission('module-list');
        $module=Module::join('role_modules', 'role_modules.module_id', '=', 'modules.id')
        ->where('role_modules.company_id',Auth::user()->company_id)->orderBy('name', 'asc')->select('modules.*')->get();
       // $module = Module::orderBy('name', 'asc')->paginate(10);
        return view('backend.module.list', compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd('module create');
        $this->checkpermission('module-create');
        $role = Role::all();
        return view('backend.module.create', compact('role'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'module_key' => 'required|unique:modules',
            'module_url' => 'required',
            'module_rank' => 'required',
        ]);
        $module = Module::create([
            'name' => $request->name,
            'module_key' => $request->module_key,
            'module_url' => $request->module_url,
            'view_sidebar' => $request->view_sidebar,
            'module_icon' => $request->module_icon,
            'module_rank' => $request->module_rank,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        if ($module) {
            foreach ($request->roles as $role) {
                $rolemodule = new RoleModule();
                $rolemodule->module_id = $module->id;
                $rolemodule->role_id = $role;
                $rolemodule->save();
            }
            return redirect()->route('module.list')->with('success_message', 'You are successfully created');
        } else {
            return redirect()->route('module.create')->with('error_message', 'You con not create rignt now');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkpermission('module-edit');
        $module = Module::find($id);
        $role = Role::where('company_id',Auth::user()->company_id)->get();
        $role_module=Module::join('role_modules', 'role_modules.module_id', '=', 'modules.id')->where('role_modules.module_id',$id)
        ->where('role_modules.company_id',Auth::user()->company_id)->get();
        $permis_roleids=[];
        foreach ($role as $key => $value) {
           $allroleids[]=$value->id;
        }
        foreach ($role_module as $key => $value) {
            $permis_roleids[]=$value->role_id;
        }
        $not_permis_roleids = array_diff($allroleids, $permis_roleids);
      // dd($permis_roleids,$not_permis_roleids);
        //$perm_role=[];
        if(!empty($permis_roleids)){
            foreach ($permis_roleids as $key => $pid) {
            $perm_role[] = Role::where('id',$pid)->first();
        }
        }else{
            $perm_role=[];
        }
        
        //$no_perm_role=[];
        if(!empty($not_permis_roleids)){
            foreach ($not_permis_roleids as $key => $npid) {
            $no_perm_role[] = Role::where('id',$npid)->first();
        }
        }else{
            $no_perm_role=[];
        }
        
        //dd($role,$perm_role,$no_perm_role);
        return view('backend.module.edit',compact('module','role','perm_role','no_perm_role'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=\Request::all();
        $this->validate($request, [
            'name' => 'required',
           // 'module_key' => 'required',
           // 'module_url' => 'required',
           // 'module_rank' => 'required',
        ]);

        if(!empty($request->nproles)){
        $nproles=$request->nproles;
       }else{
        $nproles=[];
       }
       if(!empty($request->proles)){
        $proles=$request->proles;
       }else{
        $proles=[];
       }
       // dd($input,$id);
         $res_role = array_merge($proles, $nproles); 
        
         
        $module = Module::where('id',$id)->update([
            'name' => $request->name,
            //'module_key' => $request->module_key,
           // 'module_url' => $request->module_url,
            'view_sidebar' => $request->view_sidebar,
            'module_icon' => $request->module_icon,
           // 'module_rank' => $request->module_rank,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
     $mod= Module::join('role_modules', 'role_modules.module_id', '=', 'modules.id')->where('role_modules.module_id',$id)
     ->where('role_modules.company_id',Auth::user()->company_id)->select('role_modules.*')->get();
     
     foreach ($mod as $key => $per_id) {
     DB::table('role_modules')->where('id',$per_id->id)->delete();
    
        }
        $company_id = Auth::user()->company_id;
        if ($module) {
            foreach ($res_role as $role) {
               $rolemodule = new RoleModule();
                 $rolemodule->module_id = $id;
                 $rolemodule->company_id = $company_id;
                $rolemodule->role_id = $role;
                $rolemodule->save();
              
            }
        
          
            return redirect()->route('module.list')->with('success_message', 'You are successfully Updated');
        } else {
            return redirect()->route('module.edit')->with('error_message', 'You con not create rignt now');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
