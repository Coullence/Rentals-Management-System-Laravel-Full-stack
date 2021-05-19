<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


use App\Models\Announcements;
use App\Models\AnnouncementsFiles;
class AnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $paginationEnabled = config('usersmanagement.enablePagination');
        // if ($paginationEnabled) {
        //     $blogs = Blog::paginate(config('usersmanagement.paginateListSize'));
        // } else {
        //     $blogs = Blog::all();
        // }
        // $roles = Role::all();

        // return View('pages.admin.blogsManagement.show-blogs', compact('blogs', 'roles'));

            $activeUser = \Auth::user();

        $paginationEnabled = config('usersmanagement.enablePagination');
        if ($paginationEnabled) {
            $announcements = Announcements::orderBy('id', 'desc')->paginate(config('usersmanagement.paginateListSize'));
        } else {
            $announcements = Announcements::all();

        }

        $roles = Role::all();
        return View('pages.admin.announcementsManagement.show-announcements', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('pages.admin.announcementsManagement.create-announcement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activeUser = \Auth::user(); 
        $validator = Validator::make(
            $request->all(),
            [

                'category'         => 'required',
                'title'         => 'required',
                'body'      => 'required',

            ],
            [

                'category.required'      => trans('Category is Required!'),
                'title.required'      => trans('Title is Required!'),
                'body.required'         => trans('Content is Required!'),

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $announcements = Announcements::create([

            'category'=> strip_tags($request->input('category')),
            'title'=> strip_tags($request->input('title')),
            'body'=> strip_tags($request->input('body')),
            'postedBy'=> "Admin",

        ]);

        $announcements->save();

//saving associated file

        $destination_path = storage_path('announcements');
        $files = $request->file('files');
        if($files == 0){

        }
        else{
        foreach($files as $file) {
        $validator = Validator::make(
            $request->all(),
            [
                'file'          => $file,
                'extension'     => Str::lower($file->getClientOriginalExtension()),
            ],
            [
                'file'                   => 'required|max:1',
                'extension'              => 'required|in:jpg,jpeg,bmp,png,doc,docx,zip,rar,pdf,rtf,xlsx,xls,txt, csv'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

           $filename = $file->getClientOriginalName();
           $upload_success = $file->move($destination_path, $filename);
           

        $file = AnnouncementsFiles::create([
            'announcement_id'   => $announcements->id,
            'fileName'  =>  $request->file_name = $filename,
        ]);


        $file->save();

    }
}

        return redirect('announcements')->with('success', trans('Data Posted succesfully!'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function show(Announcements $announcement)
    {   
        return View('pages.admin.announcementsManagement.show-announcement', compact('announcement'));
  
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcements $announcement)
    {
        return View('pages.admin.announcementsManagement.edit-announcement', compact('announcement'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $announcements = Announcements::find($id);
        $file = AnnouncementsFiles::find($id);

        $activeUser = \Auth::user(); 

        $announcements->category = strip_tags($request->input('category'));
        $announcements->title = strip_tags($request->input('title'));
        $announcements->body = strip_tags($request->input('body'));

        $announcements->save();

//saving associated files

        $destination_path = storage_path('announcements');
        $files = $request->file('files');
        if($files == 0){

        }
        else{
        foreach($files as $file) {
        $validator = Validator::make(
            $request->all(),
            [
                'file'          => $file,
                'extension'     => Str::lower($file->getClientOriginalExtension()),
            ],
            [
                'file'                   => 'required|max:1',
                'extension'              => 'required|in:jpg,jpeg,bmp,png,doc,docx,zip,rar,pdf,rtf,xlsx,xls,txt, csv'
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

           $filename = $file->getClientOriginalName();
           $upload_success = $file->move($destination_path, $filename);
           

    
        $file->announcement_id = $announcements->id;
        $file->fileName  =  $request->file_name = $filename;

        $file->save();

    }
}

        return redirect('announcements')->with('success', trans('Data Updated succesfully!'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
