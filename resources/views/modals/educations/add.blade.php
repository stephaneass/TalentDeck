<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addEducationModal" tabindex="-1" aria-hidden="true">
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
                            
                            <x-admin.input field='data.degree' libelle='Degree' placeholder="Enter the degree"/>
                            <x-admin.input field='data.institution' libelle='Institution' placeholder="Enter the institution"/>
                            <x-admin.input field='data.field_of_study' libelle='Field of study' placeholder="Enter the study field"/>
                            <x-admin.input field='data.graduation_date' type="date" libelle='Graduation date' placeholder="Enter the graduation date"/>
                            
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" id="hideAddEducationButton" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button wire:click="{{$buttonAction}}" type="button" class="btn btn-success" id="addNewEducation">{{$buttonTitle}}</button>
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
<button style="display: none" id="showModalButton" class="btn btn-success addEducations-modal" data-bs-toggle="modal" data-bs-target="#addEducationModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>