<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addExperienceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            
            <div class="modal-body">
                <form autocomplete="off" id="memberlist-form" >
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="memberid-input" class="form-control" value="">
                            <div class="mb-4 pt-2 text-center">
                                <h5 class="modal-title text-white" id="createMemberLabel">{{$modalTitle}}</h5>
                            </div>
                            
                            <x-admin.input field='data.company_name' libelle='company name' placeholder="Enter the company_name"/>
                            <x-admin.input field='data.job_title' libelle='job title' placeholder="Enter the job_title"/>
                            <x-admin.input field='data.start_date' type="date" libelle='Start date' placeholder="Enter the start date"/>
                            <x-admin.input field='data.end_date' type="date" libelle='End date' placeholder="Enter the end date"/>
                            <div class="mb-4">
                                <h6 class="fw-semibold">currently employed</h6>
                                <select wire:model="data.currently_employed" class="form-control" id="currently_employed" name="currently_employed">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <x-error field="data.currently_employed" />
                            </div>
                            <div class="mb-2">
                                <h6 class="fw-semibold">Description</h6>
                                <textarea wire:model="data.description" name="" id="" cols="55" rows="5"></textarea>
                                <x-error field="data.description" />
                            </div>
                            
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" id="hideAddExperienceButton" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button wire:click="{{$buttonAction}}" type="button" class="btn btn-success" id="addNewExperience">{{$buttonTitle}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end modal-->
<button style="display: none" id="showModalButton" class="btn btn-success addExperiences-modal" data-bs-toggle="modal" data-bs-target="#addExperienceModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>