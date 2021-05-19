<?php

namespace App\Http\Controllers;

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
use App\Models\Blog;
use App\Models\Image;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }
        if ($user->isCaptain()) {
            return view('pages.Captain.home');
        }
        // If is a player 
        if ($user->isPlayer()) {

              $paginationEnabled = config('usersmanagement.enablePagination');
        if ($paginationEnabled) {
            $users = User::paginate(config('usersmanagement.paginateListSize'));
            $announcements = Announcements::where('category', '=', 'players')->orderBy('id', 'desc')->paginate(config('usersmanagement.paginateListSize'));
            $blogs = Blog::orderBy('id', 'desc')->paginate(config('usersmanagement.paginateListSize'));
        } else {
            $users = User::all();
            $blogs = Blog::all();
            $announcements = Announcements::where('category', '=', 'players');

        }

            return view('pages.Player.home', compact('announcements','blogs'));
        }

        return view('pages.user.home');
    }
}
