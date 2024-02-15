<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addSkillModal" tabindex="-1" aria-hidden="true">
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
                            
                            <x-admin.input field='data.name' libelle='Label' placeholder="Enter the label"/>
                            
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" id="hideAddSkillButton" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button wire:click="{{$buttonAction}}" type="button" class="btn btn-success" id="addNewSkill">{{$buttonTitle}}</button>
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
<button style="display: none" id="showModalButton" class="btn btn-success addSkills-modal" data-bs-toggle="modal" data-bs-target="#addSkillModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>