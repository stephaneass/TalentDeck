<div id="dangerModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                </lord-icon>
                <div class="mt-2">
                    <h4 id="dangerTitle" class="mb-2">Rejet.</h4>
                    <p id="dangerBody" class="text-muted mb-1"> The transfer was not successfully received by us. the email of the recipient wasn't correct.</p>
                    
                    <input type="hidden" id="reject_id">
                    <div class="hstack gap-2 justify-content-center">
                        <button id="hideDangerButton" class="btn btn-link link-danger fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Annuler</button>
                        <button onclick="confirmReject()" class="btn btn-danger">Confirmer</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<button id="dangerButton" style="display: none;" data-bs-toggle="modal" data-bs-target="#dangerModal" class="btn btn-success"><i class="ri-thumb-up-line align-bottom"></i> Validar</button>
@push('scripts')
    <script>
        
        function showDanger(title, id, body="Etês-vous sûr(e) de vouloir confirmer cette action?") {
            $("#dangerTitle").text(title)
            $("#dangerBody").html(body)
            $("#reject_id").val(id)
            $("#dangerButton").trigger('click')
        }

        function confirmReject() {
            $("#validationLoading").show();
            var reject_id = $("#reject_id").val()
            
            Livewire.dispatch('dangerEmitted', {item_id : reject_id})
            $("#reject_id").val("")
            $("#hideDangerButton").trigger('click')
        }
    </script>
@endpush