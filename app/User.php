<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'nickname', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function changeData($user)
    {
        $name = $user['name'];
        $email = $user['email'];
        $id = $user['id'];
        $user = User::where('id', $id)->first();
        $data = ['name' => 'required|alpha|max:255'];

        if ($email != $user->email) {
            $data += ['email' => 'required|string|email|max:255|unique:users'];
        }

        $validator = Validator::make(Request::all(), $data);

        if ($validator->fails()) {
            return redirect('profile')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->email = $email;
        $user->name = $name;
        $user->save();
    }

}
