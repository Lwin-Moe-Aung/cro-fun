<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\ClientRequest;
use Datatables;
use DB;
use Carbon\Carbon;
use App\Library\ExportExcel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Library\ButtonCreator;

class ApiPagesController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        return view('page.allpage');
    }

    /**
     * Display all pages via api to finance and admin
     */
    public function allPages(Request $request, ExportExcel $exportobj)
    {
        $url = 'pages';
        $pages = ClientRequest::getClientRequest($url);

        $pages_data = Datatables::of($pages["data"])
            ->addColumn('action', function ($pages) {
                return ButtonCreator::generateButtons('CMS', $pages["id"] );
            })
            ->addColumn('route', function ($pages) {
                return url("/pages/{$pages["route"]}");
            })
            ->make(true);

        $length = $request->query('length');
        if($length == -1){
            $exportobj->export(json_decode($pages_data->content(), true), $request->query('filename'), 'pages');
            return Response::json(array(
                'success' => true
            ));
        }else{
            return $pages_data;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('page.pages');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = 'pages/store';
        $form_value = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'route' => $request->get('route'),
            'admin_id' => session('current')['id'],
            ];
        
        $message = ClientRequest::postClientRequest($url,$form_value);

        if($message == "This page is already created"){
            return Redirect::back()->with('error',$message);
        }

        return Redirect::back()->with('status',$message);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $url = "pages/".$slug;
        $page = ClientRequest::getClientRequest($url);
        if($page == "The page is not found"){
            return view('errors.404');
        }

        return view('page',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $url = "pages/edit/".$id;
        $page = ClientRequest::getClientRequest($url);
        return view('page.pages',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $url = 'pages/edit/'.$id;

        $form_value = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'route' => $request->get('route'),
            'admin_id' => session('current')['id'],
        ];
       
        $message = ClientRequest::patchClientRequest($url,$form_value);
        return redirect('/finance/page')->with('status', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $url = "pages/".$id;
        $message = ClientRequest::deleteClientRequest($url);
        return $message;
    }
}
