<?php

namespace App\Http\Livewire\Nurses;

use App\Http\Livewire\ManageModel;
use App\Models\User;
use App\Notifications\NurseWelcomeNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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

    protected function getRules()
    {
        return [
            'model.first_name'    => ['required', 'string', 'max:255'],
            'model.last_name'     => ['required', 'string', 'max:255'],
            'model.last_name2'    => ['required', 'string', 'max:255'],
            'model.email'         => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore(optional($this->model)->id)],
            'model.profile.phone' => ['required', 'numeric', 'min:10'],
        ];
    }

    protected $validationAttributes = [
        'model.first_name'    => 'name',
        'model.last_name'     => '1st last name',
        'model.last_name2'    => '2nd last name',
        'model.profile.phone' => 'cel. phone',
        'model.email'         => 'email',
    ];

    public function render()
    {
        return view('livewire.nurses.manage');
    }

    protected function store()
    {
        $this->validate();

        $profile = $this->model->profile;
        unset($this->model->profile);
        $password = rand();

        $this->model->password = Hash::make($password);
        $this->model->role = ROLE_NURSES;
        $this->model->save();

        $this->model->profile()->create([
            'country_code' => 34,
            'phone'        => data_get($profile, 'phone'),
        ]);

        $this->model->notify((new NurseWelcomeNotification($password)));

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

        $profile = $this->model->profile;
        unset($this->model->profile);

        $this->model->save();
        $this->model->profile()->update([
            'country_code' => 34,
            'phone'        => $profile->phone,
        ]);

        return redirect($this->previousUrl);
    }
}
