<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
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
     * Update the user's profile.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $data = $request->post();
        if (!empty($data)) {

            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',
                    Rule::unique('users')->ignore($user->id)],
                'password' => ['nullable', 'string', 'min:8', 'max:30', 'confirmed'],
            ]);
            $validator->validate();

            $user->name = $data['name'] ?? '';
            $user->email = $data['email'] ?? '';

            if (!empty($data['password'])) {
                $user->password = Hash::make($data['password']);
            }

            $user->save();

            session()->flash('success', 'Данные сохранены!');
        }

        return view('auth.profile', compact('user'));
    }
}
