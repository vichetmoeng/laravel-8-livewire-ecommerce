<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminUsersComponent extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $confirmpassword;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required_with:password|same:password|min:8',
        ]);
    }

    public function updateInfo()
    {
        if ($this->email != Auth::user()->email){
            $this->validate([
                'name' => 'required',
                'email' => 'unique:users|required|email',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);
        }

        $user = User::find(Auth::id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();
        session()->flash('updateinfo', 'Admin information updated!');

    }

    public function changePassword()
    {
        $this->validate([
            'password' => 'required|min:8',
            'confirmpassword' => 'required_with:password|same:password|min:8',
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($this->password);
        $user->save();
        session()->flash('passwordchanged', 'Admin password has been change!');
    }

    public function deleteUser($id)
    {
       User::find($id)->delete();
       session()->flash('message', 'User has been deleted!');
    }
    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        SEOTools::setTitle('Admin | VCVS Book Store Group');
    }
    public function render()
    {
        $users = User::all()->where('utype', 'USR');

        return view('livewire.admin.admin-users-component', ['users' => $users])->layout('layouts.base');
    }
}
