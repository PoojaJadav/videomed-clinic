<?php

namespace App\Http\Livewire\Clinics;

use App\Http\Livewire\ManageModel;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Manage extends Component implements UpdatesUserProfileInformation
{
    use ManageModel, WithFileUploads, Actions;

    public $image_path;

    public static $modelName = Clinic::class;
    public User $user;
    public $photo;

    public function mount(Clinic $model = null)
    {
        $this->refresh($model);
    }

    protected function getRules()
    {
        return [
            'model.institution_name' => ['required', 'string', 'max:255'],
            'model.address'          => ['required', 'string', 'max:255'],
            'model.country_code'     => ['required', 'string', 'max:255'],
            'model.phone'            => ['required', 'string', 'max:255'],
            'model.department'       => ['required', 'string', 'max:255'],
            //            'model.logo_path'        => ['required', 'string', 'max:255'],
            'model.email'            => ['required', 'string', 'email',
                                         Rule::unique('users', 'email')->ignore(optional($this->model)->admin_id)],

            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],

        ];
    }

    public function render()
    {
        return view('livewire.clinics.manage');
    }

    public function submit()
    {
        $this->validate();

        if ($this->photo) {
            $this->user->updateProfilePhoto($this->photo);
        }

        $email = $this->model->email;
        unset($this->model->email);

        $this->model->save();
        $this->model->admin()->update(['email' => $email]);

        $this->notification()->success(__('Success'), __('Clinic info updated successfully!'));
        $this->refresh($this->model->refresh());
    }

    private function refresh($model)
    {
        $this->model = $model->load('admin');
        $this->model->email = $model->admin->email;
        $this->user = $model->admin;
        $this->previousUrl = url()->previous();
    }

    public function update($user, array $input)
    {
        // TODO: Implement update() method.
    }

    public function deleteProfilePhoto()
    {
        $this->user->deleteProfilePhoto();
        $this->refresh($this->model);
    }
}
