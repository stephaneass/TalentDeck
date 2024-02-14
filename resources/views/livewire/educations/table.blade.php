<div>
    <!-- start page title -->
    <x-breadcrumb title="Educations"/>
    <!-- end page title -->
    @include('modals/educations/add')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
                    </div>
                    <div class="row ">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input wire:model='search' type="text" class="form-control" id="searchMemberList" placeholder="Rechercher en fonction du nom...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-sm-auto ms-auto mt-3 mt-md-0">
                            <div class="list-grid-nav hstack gap-1">
                                {{-- <button type="button" id="grid-view-button" class="btn btn-soft-info nav-link btn-icon fs-14 active filter-button"><i class="ri-grid-fill"></i></button>
                                <button type="button" id="list-view-button" class="btn btn-soft-info nav-link  btn-icon fs-14 filter-button"><i class="ri-list-unordered"></i></button> --}}
                                
                                <button wire:click="create()" class="btn btn-success"><i class="ri-add-fill me-1 align-bottom"></i> Ajouter </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="live-preview">
                        <div class="table-responsive table-card">
                            <table class="table align-middle table-nowrap table-striped-columns mb-0">
                                <x-admin.table.header :columns="$this->columns" />
                                <tbody>
                                    @foreach ($educations as $item)
                                        @include('livewire.educations.item')
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between mt-2">
                                <div> </div>
                                {{-- <div class="float-right">{{ $gsms->links() }}</div> --}}
                            </div>
                            
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{asset('admin/js/pages/select2.init.js')}}"></script>
    <script>
        Livewire.on('hideAddEducationModal', function(){
            $('#hideAddEducationButton').trigger('click');
        })
        
        Livewire.on('showModal', function(){
            $('#showModalButton').trigger('click');
        })
    </script>
@endpush