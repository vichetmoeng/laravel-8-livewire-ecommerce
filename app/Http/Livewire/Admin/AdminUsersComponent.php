<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class AdminUsersComponent extends Component
{

    public function deleteUser($id)
    {
       User::find($id)->delete();
       session()->flash('message', 'User has been deleted!');
    }
    public function mount()
    {
        SEOTools::setTitle('Admin | VCVS Book Store Group');
    }
    public function render()
    {
        $users = User::all()->where('utype', 'USR');

        return view('livewire.admin.admin-users-component', ['users' => $users])->layout('layouts.base');
    }
}
