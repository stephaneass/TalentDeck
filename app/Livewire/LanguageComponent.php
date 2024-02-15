<?php

namespace App\Livewire;

use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class LanguageComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title = "List of all your languages";
    public $state = 'actif';
    public $search = '';
    public $data= [];
    public $model;
    public $countries = [];
    public $aggregators = [];
    public $modalTitle, $buttonTitle, $buttonAction;

    protected $rules = [
        "data.name"=>"required|string",
        "data.level"=>"required",
    ];

    protected $messages = [
        "required" => "This field is required",
        "date" => "This field must be a date",
        "before" => "This field must be before today",
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
        return view('livewire.languages.table',[
            'items' => (Language::list($this->search)->paginate(10))
        ])
            ->extends('layout', ['title' => "Languages"]);
    }

    function getColumnsProperty()
    {
        return [
            "N°",
            "Name",
            "Level",
            "Status",
            "Action",
        ];
    }

    public function allData                                                                                                     ()
    {
        $this->state = 'all';
        $this->title = "All your languages";
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
        $this->modalTitle = "Add an language";
        $this->buttonTitle = "Validate";
        $this->buttonAction = "addLanguage";
        
        $this->dispatch('showModal');
    }

    public function addLanguage()
    {
        $this->validate();

        Language::create([
            'name' => $this->data['name'],
            'level' => $this->data['level'],
            'user_id' => Auth::id()
        ]);

        $this->dispatch('hideAddLanguageModal');

    }

    function edit($id)
    {
        $this->model = Language::query()->findOrFail($id);
        $this->modalTitle = "Update Language";
        $this->buttonTitle = "Update";
        $this->buttonAction = "update";

        $this->data['name'] = $this->model->name;
        $this->data['level'] = $this->model->level;
        
        $this->dispatch('showModal');
    }

    function update()
    {
        $this->validate();

        $this->model->level = $this->data['level'];
        $this->model->name = $this->data['name'];

        $this->model->save();
        
        $this->dispatch('hideAddLanguageModal');
    }

    public function suspendUser($item_id)
    {
        $language = Language::findOrFail($item_id);

        $language->markAsSuspended();
    }

    public function activateUser($item_id)
    {
        $language = Language::findOrFail($item_id);

        $language->markAsCreated();
    }
}
