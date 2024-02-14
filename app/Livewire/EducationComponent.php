<?php

namespace App\Livewire;

use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class EducationComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $title = "List of all your educations";
    public $state = 'actif';
    public $search = '';
    public $data= [];
    public $model;
    public $countries = [];
    public $aggregators = [];
    public $modalTitle, $buttonTitle, $buttonAction;

    protected $rules = [
        "data.degree"=>"required|string",
        "data.institution"=>"required",
        "data.field_of_study"=>"required",
        "data.graduation_date"=>'required|date|before:today',
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
        return view('livewire.educations.table',[
            'educations' => (Education::list($this->search)->paginate(10))
        ])
            ->extends('layout', ['title' => "Educations"]);
    }

    function getColumnsProperty()
    {
        return [
            "N°",
            "Degree",
            "Institution",
            "Field of study",
            "Graduation date",
            "Status",
            "Action",
        ];
    }

    public function allData                                                                                                     ()
    {
        $this->state = 'all';
        $this->title = "All your educations";
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
        $this->modalTitle = "Add an education";
        $this->buttonTitle = "Validate";
        $this->buttonAction = "addEducation";
        
        $this->dispatch('showModal');
    }

    public function addEducation()
    {
        $this->validate();

        Education::create([
            'degree' => $this->data['degree'],
            'institution' => $this->data['institution'],
            'field_of_study' => $this->data['field_of_study'],
            'graduation_date' => $this->data['graduation_date'],
            'user_id' => Auth::id()
        ]);

        $this->dispatch('hideAddEducationModal');

    }

    function edit($id)
    {
        /* $this->model = Gsm::query()->findOrFail($id);
        $this->modalTitle = "Modification de GSM";
        $this->buttonTitle = "Modification";
        $this->buttonAction = "update";

        $this->data['degree'] = $this->model->degree;
        $this->data['institution'] = $this->model->institution;
        $this->data['field_of_study'] = $this->model->field_of_study;
        $this->data['country_id'] = $this->model->country_id;
        $this->data['aggregator_id'] = $this->model->aggregator_id;
        $this->data['graduation_date'] = $this->model->graduation_date;
        $this->data['aggregator_recharge_rate'] = $this->model->aggregator_recharge_rate;
        $this->data['bpay_withdrawal_rate'] = $this->model->bpay_withdrawal_rate;
        $this->data['aggregator_withdrawal_rate'] = $this->model->aggregator_withdrawal_rate;
        $this->data['recharge'] = $this->model->recharge;
        $this->data['withdrawal'] = $this->model->withdrawal;
        
        $this->emit('showModal'); */
    }

    function update()
    {
        /* $gsm = Gsm::where('institution', $this->data['institution'])
                    ->where('country_id', $this->data['country_id'])
                    ->first();
        if (!blank($gsm) && $gsm->id != $this->model->id) {
            $this->addError('data.degree', "Ce GSM avec ce institution et ce pays existe déjà. Vous pouvez la modifier ou changer d'agrégateur");
            return; 
        }

        $this->model->institution = $this->data['institution'];
        $this->model->degree = $this->data['degree'];
        $this->model->field_of_study = $this->data['field_of_study'];
        $this->model->country_id = $this->data['country_id'];
        $this->model->aggregator_id = $this->data['aggregator_id'];
        $this->model->graduation_date = $this->data['graduation_date'];
        $this->model->aggregator_recharge_rate = $this->data['aggregator_recharge_rate'];
        $this->model->bpay_withdrawal_rate = $this->data['bpay_withdrawal_rate'];
        $this->model->aggregator_withdrawal_rate = $this->data['aggregator_withdrawal_rate'];
        $this->model->recharge = $this->data['recharge'];
        $this->model->withdrawal = $this->data['withdrawal'];

        $this->model->save();
        
        $this->emit('hideAddGSMModal'); */
    }

    public function suspendUser($gsm_id)
    {
        /* $gsm = Gsm::findOrFail($gsm_id);

        $gsm->markAsSuspended(); */
    }

    public function activateUser($gsm_id)
    {
        /* $gsm = Gsm::findOrFail($gsm_id);

        $gsm->markAsActif(); */
    }
}
