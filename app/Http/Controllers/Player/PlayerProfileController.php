<?php

namespace App\Http\Controllers\Player;

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



use App\Models\Announcements;
use App\Models\AnnouncementsFiles;
use App\Models\Blog;
use App\Models\Image;

class PlayerProfileController extends Controller
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
        $user = Auth::user();
        return View('pages.Player.ProfileManagement.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return View('pages.Player.ProfileManagement.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user, $id)
    {
        // get user by id
        $user = User::find($id);
        $emailCheck = ($request->input('email') !== '') && ($request->input('email') !== $user->email);
        $ipAddress = new CaptureIpTrait();

        if ($emailCheck) {
            $validator = Validator::make($request->all(), [
                'email'         => 'email|max:255|unique:users',
                'first_name'    => 'alpha_dash',
                'last_name'     => 'alpha_dash',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
               
                'first_name'    => 'alpha_dash',
                'last_name'     => 'alpha_dash',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->first_name = strip_tags($request->input('first_name'));
        $user->last_name = strip_tags($request->input('last_name'));

        if ($emailCheck) {
            $user->email = $request->input('email');
        }

        if ($request->input('password') !== null) {
             $validator = Validator::make($request->all(), [
                'password'      => 'present|confirmed|min:6',
            ]);
               if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                 }
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return back()->with('success', trans('usersmanagement.updateSuccess'));
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
