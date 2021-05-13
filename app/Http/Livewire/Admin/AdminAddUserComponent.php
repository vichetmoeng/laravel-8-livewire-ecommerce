<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminAddUserComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirmpassword;
    public $role;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required_with:password|same:password|min:8',
            'role' => 'required',
        ]);
    }

    public function addUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required_with:password|same:password|min:8',
            'role' => 'required',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->utype = $this->role;
        $user->password = Hash::make($this->password);
        $user->save();
        session()->flash('message', 'User has been added!');
    }

    public function mount()
    {
        SEOTools::setTitle('Admin | VCVS Book Store Group');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-user-component')->layout('layouts.base');
    }
}
