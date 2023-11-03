<?php

namespace App\Http\Controllers;

use App\Helpers\Master;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //

    public function based(Request $request){
        $MasterClass = new Master();

        $checkAuth = $MasterClass->AuthenticatedView($request->route()->uri());
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){

            return redirect('/dashboard');

        }else{
            return redirect('/login');
        }
    }
    public function dashboard(Request $request){
        $MasterClass = new Master();

        $checkAuth = $MasterClass->AuthenticatedView($request->route()->uri());
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
           
            $javascriptFiles = [
                asset('action-js/global/global-action.js'),
                // asset('action-js/generate/generate-action.js'),
            ];
        
            $cssFiles = [
                // asset('css/main.css'),
                // asset('css/custom.css'),
            ];
            $baseURL = url('/');
            $varJs = [
                'const baseURL = "' . $baseURL . '"',
            ];

            $data = [
                'javascriptFiles' => $javascriptFiles,
                'cssFiles' => $cssFiles,
                'varJs'=> $varJs
                // Menambahkan base URL ke dalam array
            ];
        
            return view('pages.admin.dashboard')
                ->with($data);
        }else{
            return redirect('/login');
        }
    }
    public function userlist(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->AuthenticatedView($request->route()->uri());
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
            $javascriptFiles = [
                asset('action-js/global/global-action.js'),
                // asset('action-js/generate/generate-action.js'),
                asset('action-js/user/userlist-action.js'),
            ];
        
            $cssFiles = [
                // asset('css/main.css'),
                // asset('css/custom.css'),
            ];
            $baseURL = url('/');
            $varJs = [
                'const baseURL = "' . $baseURL . '"',
            ];
    
            $data = [
                'javascriptFiles' => $javascriptFiles,
                'cssFiles' => $cssFiles,
                'varJs'=> $varJs
                 // Menambahkan base URL ke dalam array
            ];
        
            return view('pages.admin.users.userlist')
                ->with($data);
        }else{
            return redirect('/login');
        }

        
    }

    public function userrole(Request $request){

        $MasterClass = new Master();

        $checkAuth = $MasterClass->AuthenticatedView($request->route()->uri());
        
        if($checkAuth['code'] == $MasterClass::CODE_SUCCESS){
        

            $javascriptFiles = [
                asset('action-js/global/global-action.js'),
                asset('action-js/user/userrole-action.js'),
            ];
        
            $cssFiles = [
                // asset('css/main.css'),
                // asset('css/custom.css'),
            ];
            $baseURL = url('/');
            $varJs = [
                'const baseURL = "' . $baseURL . '"',
            ];

            $data = [
                'javascriptFiles' => $javascriptFiles,
                'cssFiles' => $cssFiles,
                'varJs'=> $varJs
                // Menambahkan base URL ke dalam array
            ];
            return view('pages.admin.users.userrole')
            ->with($data);
            
        }else{
            return redirect('/login');
        }
    
        
    }

    
}
