<?php

namespace App\Livewire;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SkillComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title = "List of all your skills";
    public $state = 'actif';
    public $search = '';
    public $data= [];
    public $model;
    public $countries = [];
    public $aggregators = [];
    public $modalTitle, $buttonTitle, $buttonAction;
    public User $user;

    protected $rules = [
        "data.name"=>"required|string",
    ];

    protected $messages = [
        "required" => "This field is required",
    ];

    protected $listeners = [
        "ValidationEmitted" => "activateUser",
        "dangerEmitted" => "suspendUser"
    ];

    function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.skills.table',[
            'items' => (Skill::list($this->user->id, $this->search)->paginate(10))
        ])
            ->extends('layout', ['title' => "Skills"]);
    }

    function getColumnsProperty()
    {
        return [
            "N°",
            "Label",
            "Status",
            "Action",
        ];
    }

    public function allData                                                                                                     ()
    {
        $this->state = 'all';
        $this->title = "All your skills";
    }

    function actif()
    {
        $this->state = 'actif';
        $this->title = "Liste des GSM actifs";
    }

    function suspended()
    {
        $this->state = 'suspended';
        $this->title = "Liste des GSM suspendus";
    }

    function create()
    {
        $this->model = null;
        $this->data = [];
        $this->modalTitle = "Add a skill";
        $this->buttonTitle = "Validate";
        $this->buttonAction = "addSkill";
        
        $this->dispatch('showModal');
    }

    public function addSkill()
    {
        $this->validate();

        Skill::create([
            'name' => $this->data['name'],
            'user_id' => $this->user->id
        ]);

        $this->dispatch('hideAddSkillModal');

    }

    function edit($id)
    {
        $this->model = Skill::query()->findOrFail($id);
        $this->modalTitle = "Update Skill";
        $this->buttonTitle = "Update";
        $this->buttonAction = "update";

        $this->data['name'] = $this->model->name;
        
        $this->dispatch('showModal');
    }

    function update()
    {
        $this->validate();

        $this->model->name = $this->data['name'];

        $this->model->save();
        
        $this->dispatch('hideAddSkillModal');
    }

    public function suspendUser($item_id)
    {
        $skill = Skill::findOrFail($item_id);

        $skill->markAsSuspended();
    }

    public function activateUser($item_id)
    {
        $skill = Skill::findOrFail($item_id);

        $skill->markAsCreated();
    }
}
