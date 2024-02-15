<div id="validationModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                </lord-icon>
                <div class="mt-4">
                    <h4 id="validateTitle" class="mb-3">Validation.</h4>
                    <p id="validateBody" class="text-muted mb-4"> The transfer was not successfully received by us. the email of the recipient wasn't correct.</p>
                    <input type="hidden" id="item_id">
                    <div class="hstack gap-2 justify-content-center">
                        <button id="hideValidationButton" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Annuler</button>
                        <button onclick="confirm()" class="btn btn-success">Confirmer</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<button id="validationButton" style="display: none;" data-bs-toggle="modal" data-bs-target="#validationModal" class="btn btn-success"><i class="ri-thumb-up-line align-bottom"></i> Validar</button>
@push('scripts')
    <script>
        
        function showValidate(title, id, body="Etês-vous sûr(e) de vouloir confirmer cette action?") {
            $("#validateTitle").text(title)
            $("#validateBody").html(body)
            $("#item_id").val(id)
            $("#validationButton").trigger('click')
        }

        function confirm() {
            $("#validationLoading").show();
            console.log("entree2")
            var item_id = $("#item_id").val()
            Livewire.dispatch('ValidationEmitted', {item_id : item_id})
            $("#item_id").val("")
            $("#hideValidationButton").trigger('click')
        }
    </script>
@endpush