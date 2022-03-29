<?php

namespace App\Http\Livewire\Nurses;

use App\Http\Livewire\WithSorting;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithSorting, WithPagination;

    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.nurses.index', [
            'nurses' => User::query()
                ->role(ROLE_NURSES)
                ->when($this->search, function ($q) {
                    $q->where('first_name', 'like', "%{$this->search}%");
                })
                ->when($this->sort_by, function ($q) {
                    $q->orderBy($this->sort_by, $this->sort_direction);
                })
                ->with('profile')
                ->latest()
                ->paginate(PER_PAGE),
        ]);
    }
}
