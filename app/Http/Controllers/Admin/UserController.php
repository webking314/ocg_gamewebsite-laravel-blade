<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Models\Auth\User;
use Models\Auth\BankAccount;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function index() {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function showdata(Request $request) {
        $input = $request->all();
        $users = User::select('id', 'nickname', 'mobile_number', 'email', 'credits', 'country_code', 'currency_code', 'suspended_on');
        $users->orderBy('id', 'desc');
        $data = $users->get()->toArray();
        return Datatables::of($data)
                        ->filter(function ($instance) use ($request) {

                            if ($request->has('nickname') && $request->nickname != null) {
                                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                    return Str::contains(Str::lower($row['nickname']), Str::lower($request->get('nickname'))) ? true : false;
                                });
                            }
                            if ($request->has('mobile_number') && $request->mobile_number != null) {
                                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                    return Str::contains(Str::lower($row['mobile_number']), Str::lower($request->get('mobile_number'))) ? true : false;
                                });
                            }
                            if ($request->has('email') && $request->email != null) {
                                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                    return Str::contains(Str::lower($row['email']), Str::lower($request->get('email'))) ? true : false;
                                });
                            }
                            if ($request->has('credits') && $request->credits != null) {
                                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                    return Str::contains(Str::lower($row['credits']), Str::lower($request->get('credits'))) ? true : false;
                                });
                            }
                            if ($request->has('country_code') && $request->country_code != null) {
                                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                    return Str::contains(Str::lower($row['country_code']), Str::lower($request->get('country_code'))) ? true : false;
                                });
                            }
                            if ($request->has('currency_code') && $request->currency_code != null) {
                                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                    return Str::contains(Str::lower($row['currency_code']), Str::lower($request->get('currency_code'))) ? true : false;
                                });
                            }
                        })->make(true);
    }

    public function edit($id) {
        $user = User::with('referrals')->findOrFail($id);
        $bankAccount = BankAccount::where('user_id', $id)->first();
        return view('admin.user.edit', compact('user', 'bankAccount'));
    }

    public function show($id) {
        $user['details'] = User::where('id', $id)->first();
        $gender = User::getGenderList();
        $user['gender'] = $gender[$user['details']->gender];
        return view('admin.user.profile', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, User::rules(true, $id));
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user.index')->with('message', trans('user.success_edited'));
    }

    public function suspendUser($id) {
        $user = User::where('id', $id)->first();
        $user->suspended_on = date('Y-m-d h:m:s');
        $user->save();
        return back()->with('message', trans('user.user_suspend'));
    }

    public function resumeUser($id) {
        $user = User::where('id', $id)->first();
        $user->suspended_on = Null;
        $user->save();
        return back()->with('message', trans('user.user_resume'));
    }

    public function switchUser(Request $request, User $user) {
        $new_user = User::find($user->id);
        Session::put('orig_user', Auth::id());
        Auth::login($new_user);
        return redirect('/account/dashboard');
    }

    public function switchBack() {
        $id = Session::pull('orig_user');
        $orig_user = User::find($id);
        Auth::login($orig_user);
        return redirect()->route('user.index');
    }

}
