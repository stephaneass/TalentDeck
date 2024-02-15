<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addLanguageModal" tabindex="-1" aria-hidden="true">
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
                            <div class="mb-4">
                                <h6 class="fw-semibold">Level</h6>
                                <select wire:model="data.level" class="form-control" id="level" name="level">
                                    <option value="">Select the level</option>
                                    <option value="1">Weak</option>
                                    <option value="2">Medium</option>
                                    <option value="3">High</option>
                                </select>
                                <x-error field="data.level" />
                            </div>
                            
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" id="hideAddLanguageButton" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button wire:click="{{$buttonAction}}" type="button" class="btn btn-success" id="addNewLanguage">{{$buttonTitle}}</button>
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
<button style="display: none" id="showModalButton" class="btn btn-success addLanguages-modal" data-bs-toggle="modal" data-bs-target="#addLanguageModal"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>