<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Operation;
use App\Models\OperationType;
use App\Models\Skill;
use App\Models\Subscription;
use App\Models\User;
use App\Utils\StateLabel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $user;

    function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard',
            [
                'users_dash' => $this->getUserDash()
            ])
            ->extends('layout', ['title' => "Dashboard"]);
    }

    function getUserDash()
    {
        return [
            [
                'title' => 'Educations',
                'number' => Education::list($this->user->id)->where('state', 'created')->count(),
                'color' => 'primary',
                'icon' => 'ri-pantone-line'
            ],
            [
                'title' => 'Experiences',
                'number' => Experience::list($this->user->id)->where('state', 'created')->count(),
                'color' => 'info',
                'icon' => "ri-menu-add-line"
            ],
            [
                'title' => 'Skills',
                'number' => Skill::list($this->user->id)->where('state', 'created')->count(),
                'color' => 'warning',
                'icon' => "ri-bar-chart-2-line"
            ],
            [
                'title' => 'Languages',
                'number' => Language::list($this->user->id)->where('state', 'created')->count(),
                'color' => 'success',
                'icon' => "ri-file-list-3-line"
            ],
        ];
    }
}
