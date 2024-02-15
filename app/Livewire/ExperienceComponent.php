<?php

namespace App\Livewire;

use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ExperienceComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title = "List of all your experiences";
    public $state = 'actif';
    public $search = '';
    public $data= [];
    public $model;
    public $countries = [];
    public $aggregators = [];
    public $modalTitle, $buttonTitle, $buttonAction;

    protected $rules = [
        "data.company_name"=>"required|string",
        "data.job_title"=>"required",
        "data.start_date"=>'required|date|before:today',
        "data.end_date"=>'nullable|date|after:data.start_date',
        "data.currently_employed"=>"required|boolean",
        "data.description"=>"required",
    ];

    protected $messages = [
        "required" => "This field is required",
        "date" => "This field must be a date",
        "before" => "This field must be before today",
        "after" => "This field must be after start date",
    ];

    protected $listeners = [
        "ValidationEmitted" => "activateUser",
        "dangerEmitted" => "suspendUser"
    ];

    function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.experiences.table',[
            'experiences' => (Experience::list($this->search)->paginate(10))
        ])
            ->extends('layout', ['title' => "Experiences"]);
    }

    function getColumnsProperty()
    {
        return [
            "N°",
            "Company",
            "Job title",
            "start_date",
            "end_date",
            "currently_employed",
            "description",
            "Status",
            "Action",
        ];
    }

    public function allData                                                                                                     ()
    {
        $this->state = 'all';
        $this->title = "All your experiences";
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
        $this->modalTitle = "Add an experience";
        $this->buttonTitle = "Validate";
        $this->buttonAction = "addExperience";
        
        $this->dispatch('showModal');
    }

    public function addExperience()
    {
        $this->validate();

        Experience::create([
            'company_name' => $this->data['company_name'],
            'job_title' => $this->data['job_title'],
            'start_date' => $this->data['start_date'],
            'end_date' => $this->data['end_date']??null,
            'currently_employed' => $this->data['currently_employed'],
            'description' => $this->data['description'],
            'user_id' => Auth::id()
        ]);

        $this->dispatch('hideAddExperienceModal');

    }

    function edit($id)
    {
        $this->model = Experience::query()->findOrFail($id);
        $this->modalTitle = "Update Experience";
        $this->buttonTitle = "Update";
        $this->buttonAction = "update";

        $this->data['company_name'] = $this->model->company_name;
        $this->data['job_title'] = $this->model->job_title;
        $this->data['start_date'] = $this->model->start_date;
        $this->data['end_date'] = $this->model->end_date;
        $this->data['currently_employed'] = $this->model->currently_employed;
        $this->data['description'] = $this->model->description;
        
        $this->dispatch('showModal');
    }

    function update()
    {
        $this->validate();

        $this->model->job_title = $this->data['job_title'];
        $this->model->company_name = $this->data['company_name'];
        $this->model->start_date = $this->data['start_date'];
        $this->model->end_date = $this->data['end_date'];
        $this->model->currently_employed = $this->data['currently_employed'];
        $this->model->description = $this->data['description'];

        $this->model->save();
        
        $this->dispatch('hideAddExperienceModal');
    }

    public function suspendUser($item_id)
    {
        $experience = Experience::findOrFail($item_id);

        $experience->markAsSuspended();
    }

    public function activateUser($item_id)
    {
        $experience = Experience::findOrFail($item_id);

        $experience->markAsCreated();
    }
}
