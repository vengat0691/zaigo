<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidation;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OperationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_user = \App\User::where('active_status', 1);
        $list_user = $list_user->orderBy('updated_at', 'desc')->get();
        $count = count($list_user);
        return view('list_user', compact('list_user', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidation $request)
    {
        $validated = $request->validated(); //for validation
        $user = new \App\User;
        if ($request->file('image') != '') {
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $input['imagename']);
            $user->image = $input['imagename'];
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->type = $request->get('type');
        $user->address = $request->get('address');
        $user->zip_code = $request->get('zip_code');
        $user->mobile = $request->get('mobile');
        $user->date = date('Y-m-d');
        $user->time = date('H:i:s');
        $user->active_status = 1;
        $user->save();
        return redirect('list')->with('success', 'User added successfully');
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
        $user_type = Auth::user()->type;
        $user_id = Auth::user()->id;
        if (($user_type == 'A') || ($user_type == 'U') && ($user_id == $id)) {
            $user = \App\User::find($id);
            return view('edit_user', compact('user', 'id'));
        } else {
            return redirect('list');
        }

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
        $user_type = Auth::user()->type;
        $user_id = Auth::user()->id;
        if (($user_type == 'A') || ($user_type == 'U') && ($user_id == $id)) {

            $user = \App\User::find($id);
            if ($request->file('image') != '') {
                $image = $request->file('image');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/img');
                $image->move($destinationPath, $input['imagename']);
                $user->image = $input['imagename'];
            }
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->type = $request->get('type');
            $user->address = $request->get('address');
            $user->zip_code = $request->get('zip_code');
            $user->mobile = $request->get('mobile');
            $user->date = date('Y-m-d');
            $user->time = date('H:i:s');
            $user->active_status = 1;
            $user->save();
            return redirect('list')->with('success', 'User updated successfully');
        } else {
            return redirect('list');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_type = Auth::user()->type;
        if ($user_type == 'A') {
            $user = \App\User::find($id);
            $user->active_status = 0;
            $user->save();
            return redirect('list')->with('error', 'User deleted successfully');
        } else {
            return redirect('list');
        }
    }
}
