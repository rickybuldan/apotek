<?php

namespace App\Http\Controllers;

use App\Models\UserAccess;
use Illuminate\Http\Request;
use App\Helpers\Master;
use App\Models\User;
use App\Models\MenusAccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JsonDataController extends Controller
{
    //
    public function getLokasi(Request $request){
        $javascriptFile = asset('action-js/dashboard/dashboard-action.js');
        return view('pages.admin.dashboard')->with('javascriptFile', $javascriptFile);
    }
    // for list menu side bar
    public function getAccessMenu(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    DB::beginTransaction();     
                    

                    $status = [];
                    $role_id = $MasterClass->getSession('role_id');
                    $saved = DB::select("SELECT * FROM menus_access ma LEFT JOIN users_access ua ON ma.id = ua.menu_access_id WHERE ua.role_id =".$role_id. " AND ua.i_view=1");

                    $saved = $MasterClass->checkErrorModel($saved);
                    
                    $status = $saved;
 
                    // if($status['code'] == $MasterClass::CODE_SUCCESS){
                    //     DB::commit();
                    // }else{
                    //     DB::rollBack();
                    // }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    //USER ROLE
    public function getRoleMenuAccess(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    $data = json_decode($request->getContent());
                    
                    DB::beginTransaction();
            
                    $status = [];
                    $sql    ="SELECT * FROM users_roles ur LEFT JOIN users_access ua ON ur.id = ua.role_id WHERE ua.menu_access_id=".$data->id;
                    // dd($sql);
                    $saved = DB::select($sql);
                    $saved = $MasterClass->checkErrorModel($saved);
                    
                    $status = $saved;
 
                    // if($status['code'] == $MasterClass::CODE_SUCCESS){
                    //     DB::commit();
                    // }else{
                    //     DB::rollBack();
                    // }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    public function getRole(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    $data = json_decode($request->getContent());

                    
                    DB::beginTransaction();
            
                    $status = [];
  
                    $saved = DB::select('SELECT * FROM users_roles ur');
                    $saved = $MasterClass->checkErrorModel($saved);
                    
                    $status = $saved;
 
                    // if($status['code'] == $MasterClass::CODE_SUCCESS){
                    //     DB::commit();
                    // }else{
                    //     DB::rollBack();
                    // }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    public function getAccessRole(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    DB::beginTransaction();

                    $dataArray = $request->get('param_type');

                    $status = [];
                    $sql ='SELECT ma.*  FROM menus_access ma WHERE ma.param_type ="'.$dataArray.'"';
                    
                    $saved = DB::select($sql);
                    // $saved = MenusAccess::leftJoin()where('param_type', 'VIEW')->get();
                    
                    $saved = $MasterClass->checkErrorModel($saved);
                    
                    $status = $saved;
 
                    // if($status['code'] == $MasterClass::CODE_SUCCESS){
                    //     DB::commit();
                    // }else{
                    //     DB::rollBack();
                    // }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    public function saveUserAccessRole(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    $dataArray = json_decode($request->getContent());

                    DB::beginTransaction();
                    $status = [];
                    // Simpan informasi metode ke dalam database AccessUser
                    foreach ($dataArray as $data) {

                        $saved = UserAccess::updateOrCreate(
                            [
                                'menu_access_id' => $data->mid,
                                'role_id' => $data->rid, // Gantilah $roleId dengan nilai yang sesuai
                            ], // Kolom dan nilai kriteria
                            [
                                'i_view' => $data->is_active,
                            ] // Kolom yang akan diisi
                        );
                        $saved = $MasterClass->checkErrorModel($saved);
                        
                        $status = $saved;
                        
                        if($status['code'] != $MasterClass::CODE_SUCCESS){
                            break;
                        }
                       
                    }   

                    if($status['code'] == $MasterClass::CODE_SUCCESS){
                        DB::commit();
                    }else{
                        DB::rollBack();
                        
                    }               
                    
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    public function updateMenuAccessName(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    $mid = $request->get('mid');
                    $headmenu = $request->get('nhead');
                    $menuname = $request->get('nmenu');

                    DB::beginTransaction();
                    // dd($mid);
                    
                    $status = [];
                    // Simpan informasi metode ke dalam database AccessUser
                    
                    $saved = MenusAccess::where([
                        'id' => $mid,
                    ])->update([
                        'header_menu' => $headmenu,
                        'menu_name' => $menuname,
                    ]);


                    $saved = $MasterClass->checkerrorModelUpdate($saved);
                    
                    $status = $saved;
                

                    if($status['code'] == $MasterClass::CODE_SUCCESS){
                        DB::commit();
                    }else{
                        DB::rollBack();
                        
                    }               
                    
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];

                    // dd($results);
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    
    //USER LIST
    public function getUserList(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    DB::beginTransaction();     
                    

                    $status = [];

                    $query = "
                        SELECT
                            us.id,
                            us.name,
                            us.email,
                            us.is_active,
                            us.role_id,
                            ur.role_name 
                        FROM
                            users us
                            LEFT JOIN users_roles ur ON us.role_id = ur.id
                        
                    ";
        
                    $saved = DB::select($query);
                    $saved = $MasterClass->checkErrorModel($saved);
                    
                    $status = $saved;
 
                    // if($status['code'] == $MasterClass::CODE_SUCCESS){
                    //     DB::commit();
                    // }else{
                    //     DB::rollBack();
                    // }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }

    public function saveUser(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    DB::beginTransaction();     

                    $data = json_decode($request->getContent());
             
                    $status = [];
                    if ($data->password){
                        
                        $saved = User::updateOrCreate(
                            [
                                'id' => $data->id,
                            ], 
                            [
                                'name' => $data->name,
                                'email'=> $data->email,
                                'role_id' => $data->role_id,
                                'password' => Hash::make($data->password),
                                'is_active' => $data->is_active,
                            ] // Kolom yang akan diisi
                        );

                    }else{
                      
                        $saved = User::updateOrCreate(
                            [
                                'id' => $data->id,
                            ], 
                            [
                                'name' => $data->name,
                                'email'=> $data->email,
                                'role_id' => $data->role_id,
                                'is_active' => $data->is_active,
                            ] // Kolom yang akan diisi
                        );
                        
                    }
                    
                    $saved = $MasterClass->checkErrorModel($saved);
                    
                    $status = $saved;
 
                    if($status['code'] == $MasterClass::CODE_SUCCESS){
                        DB::commit();
                    }else{
                        DB::rollBack();
                    }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }

    public function deleteUser(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->Authenticated($MasterClass->getSession('user_id'));
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            try {
                if ($request->isMethod('post')) {

                    DB::beginTransaction();     

                    $data = json_decode($request->getContent());
                    
                    $status = [];

                    $saved = User::where('id', $data->id)->delete();
                    
                    $saved = $MasterClass->checkerrorModelUpdate($saved);
                    
                    $status = $saved;
 
                    if($status['code'] == $MasterClass::CODE_SUCCESS){
                        DB::commit();
                    }else{
                        DB::rollBack();
                    }
        
                    $results = [
                        'code' => $status['code'],
                        'info'  => $status['info'],
                        'data'  =>  $status['data'],
                    ];
                        
        
        
                } else {
                    $results = [
                        'code' => '103',
                        'info'  => "Method Failed",
                    ];
                }
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                $results = [
                    'code' => '102',
                    'info'  => $e->getMessage(),
                ];
    
            }
        }
        else {
    
            $results = [
                'code' => '403',
                'info'  => "Unauthorized",
            ];
            
        }

        return $MasterClass->Results($results);

    }
    

}
