<div>
    <div class="col-xxl-9">
        <div wire:ignore.self class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalInfos" role="tab">
                            <i class="fas fa-home"></i> Information Personnelle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i> Changer de Mot de Passe
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div wire:ignore.self class="tab-pane active" id="personalInfos" role="tabpanel">
                        <form  action="">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <x-admin.input field='data.last_name' libelle='Nom' placeholder="Entrez le nom"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <x-admin.input field='data.first_name' libelle='Prénom' placeholder="Entrez le prénom"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <x-admin.input field='data.email' libelle='E-mail' type="email" placeholder="Entrez l'e-mail"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <x-admin.input field='data.contact' libelle='Numéro téléphone' placeholder="Entrez le numéro de téléphone"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6 " wire:key="A">
                                    <h6 class="fw-semibold">Pays</h6>
                                    <select wire:model="data.country_id" class="form-select " aria-label="Default select example">
                                        <option value=""></option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <x-error field="data.country_id" />
                                </div>
                                <div class="col-lg-6">
                                    <x-admin.input type="date" field='data.birth_day' libelle='Date de naissance' placeholder="Entrez votre date de naissance"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" wire:click='update()' class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                    <div wire:ignore.self class="tab-pane" id="changePassword" role="tabpanel">
                        <form action="javascript:void(0);">
                            <div class="row g-2">
                                <div class="col-12">
                                    <x-alert />
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <x-admin.input type="password" field='password.old' libelle='Ancien Mot de Passe' placeholder="Entrez l'ancien mot de passe"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div>
                                        <x-admin.input type="password" field='password.new' libelle='Nouveau Mot de Passe' placeholder="Entrez le nouveau mot de passe"/>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <x-admin.input type="password" field='password.confirm' libelle='Confirmer' placeholder="Entrez le nouveau mot de passe à nouveau"/>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button wire:click="changePassword()" type="button" class="btn btn-success">Modifier</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush