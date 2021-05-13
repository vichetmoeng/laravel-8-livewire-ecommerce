<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class AdminEditUserComponent extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $role;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'unique:users|required|email',
            'role' => 'required',
        ]);
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'unique:users|required|email',
            'role' => 'required',
        ]);
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->utype = $this->role;
        $user->save();
        session()->flash('message', 'User has been edit!');
    }

    public function mount($user_id)
    {
        $user = User::find($user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->utype;
        SEOTools::setTitle('Admin | VCVS Book Store Group');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-user-component')->layout('layouts.base');
    }
}
