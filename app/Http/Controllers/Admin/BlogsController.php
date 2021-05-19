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


use App\Models\Blog;
use App\Models\Image;


class BlogsController extends Controller
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
            $users = User::paginate(config('usersmanagement.paginateListSize'));
            $blogs = Blog::orderBy('id', 'desc')->paginate(config('usersmanagement.paginateListSize'));
        } else {
            $users = User::all();
            $blogs = Blog::all();

        }

        $roles = Role::all();
        return View('pages.admin.blogsManagement.show-blogs', compact('users','blogs','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View('pages.admin.blogsManagement.create-blog');
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

                'title'         => 'required',
                'body'      => 'required',

            ],
            [

                'title.required'      => trans('Title is Required!'),
                'body.required'         => trans('Content is Required!'),

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $blog = Blog::create([

            'title'=> strip_tags($request->input('title')),
            'body'=> strip_tags($request->input('body')),
            'postedBy'=> "Admin",

        ]);

        $blog->save();

//saving associated image

        $destination_path = storage_path('uploads');
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
           

        $file = Image::create([
            'blog_id'   => $blog->id,
            'fileName'  =>  $request->file_name = $filename,
        ]);


        $file->save();

    }
}

        return redirect('blogs')->with('success', trans('Data Posted succesfully!'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

       public function show($id)
    {

      // $orders = Order::find($id);
       $blog = Blog::find($id);

       $images = Image::all()->where('blog_id','=', $blog->id);
        return View('pages.admin.blogsManagement.show-blog', [ 'blog'=>$blog,'images'=> $images]);

        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return View('pages.admin.blogsManagement.edit-blog', compact('blog'));
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

        $blog = Blog::find($id);
        $file = Image::find($id);

        $activeUser = \Auth::user(); 
        $validator = Validator::make(
            $request->all(),
            [

                'title'         => 'required',
                'body'      => 'required',

            ],
            [

                'title.required'      => trans('Title is Required!'),
                'body.required'         => trans('Content is Required!'),

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        


        $blog->title = strip_tags($request->input('title'));
        $blog->body = strip_tags($request->input('body'));

        $blog->save();

//saving associated image

        $destination_path = storage_path('uploads');
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
           

    
        $file->blog_id = $blog->id;
        $file->fileName  =  $request->file_name = $filename;

        $file->save();

    }
}

        return redirect('blogs')->with('success', trans('Data Updated succesfully!'));

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
