<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;


class ListUsers extends Component
{

    public $state = [];

    public $user;

    public $showEditModal = false;

    public function render(){

        $users = User::latest()->paginate();

        return view('livewire.admin.users.list-users', [
            'users' => $users,
        ]);
    }

    public function addNew() {

        $this->state = [];

        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser() {

        $validateData = Validator::make($this->state, [
           'email' => 'required|email|unique:users',
           'name' => 'required',
           'password' => 'required|confirmed',
       ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

      User::create($validateData);


      $this->dispatchBrowserEvent('hide-form', ['message' => 'Thêm quản trị viên thành công']);

    }

    public function edit(User $user) {

        //dd($user);
        $this->showEditModal = true;

       $this->user = $user;

        $this->state = $user->toArray();

        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser () {

        $validateData = Validator::make($this->state, [
            'email' => 'required|email|unique:users,email,' .$this->user->id,
            'name' => 'required',
            'password' => 'sometimes|confirmed',
        ])->validate();

        if (!empty($validateData['password'])) {
            $validateData['password'] = bcrypt($validateData['password']);
        }

        $this->user->update($validateData);


        $this->dispatchBrowserEvent('hide-form', ['message' => 'Sửa thông tin quản trị viên thành công']);

    }
    public  function confirmUserRemoval($userId) {

        $this->userIdBeingRemoved = $userId;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public  function deleteUser() {

        $user = User::findOrFail($this->userIdBeingRemoved);

       $user->delete();

       $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Xoá quản trị thành công']);
    }
}
