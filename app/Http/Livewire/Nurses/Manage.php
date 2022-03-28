<?php

namespace App\Http\Livewire\Nurses;

use App\Http\Livewire\ManageModel;
use App\Models\User;
use function auth;
use Livewire\Component;
use function redirect;
use function url;
use function view;

class Manage extends Component
{
    use ManageModel;

    public static $modelName = User::class;

    public function mount(User $model = null)
    {
        $this->model = $model;
        $this->previousUrl = url()->previous();
    }

    protected $rules = [
        'model.first_name'           => ['required', 'string', 'max:255'],
        'model.last_name'            => ['required', 'string', 'max:255'],
        'model.last_name2'           => ['required', 'string', 'max:255'],
        'model.profile.phone'        => ['required', 'string', 'max:255'],
        'model.profile.country_code' => ['required', 'string', 'max:255'],
    ];

    protected $validationAttributes = [
        'model.first_name'           => 'name',
        'model.last_name'            => '1st last name',
        'model.last_name2'           => '2nd last name',
        'model.profile.phone'        => 'Phone',
        'model.profile.country_code' => 'code',
    ];

    public function render()
    {
        return view('livewire.nurses.manage');
    }

    protected function store()
    {
        $this->validate();

        $this->model->save();

        return redirect()->route('nurses.index');
    }

    public function edit(User $user)
    {
        $this->editing = true;
        $user->load('profile');
        $this->model = $user;

        $this->resetErrorBag();
        $this->open();
    }

    protected function update()
    {
        $this->validate();

        $this->model->save();

        return redirect($this->previousUrl);
    }
}
