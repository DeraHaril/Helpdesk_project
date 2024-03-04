@extends('header')

@section('contenu')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Profil</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Paramètre du compte</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">Informations personnelles</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">Mettre à jour mon profil</span>
                            </div>
                            <div class="card-toolbar">
                        <form method="POST" action="{{ url('profil/mise-a-jour')}}">
                            @csrf
                                <button type="submit" class="btn btn-success mr-2">Sauvegarder</button>
                                <button type="reset" class="btn btn-secondary">annuler</button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">A propos</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Nom Complet</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name ="nom" class="form-control form-control-lg form-control-solid" type="text" value="{{session('nom')}}" />
                                        <span class="form-text text-muted">Prénom et nom</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Profession/Poste</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="profession" class="form-control form-control-lg form-control-solid" type="text" value="{{session('profession')}}" />
                                        <span class="form-text text-muted">Votre profession actuelle</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Mot de passe</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <!-- Button trigger modal-->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                            Changer mot de passe
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Numero Telephone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-phone"></i>
                                                </span>
                                            </div>
                                            <input name="numero_telephone" type="text" class="form-control form-control-lg form-control-solid" value="{{session('numero_telephone')}}" placeholder="Phone" />
                                        </div>
                                        <span class="form-text text-muted">Votre numero de telephone actuel.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Adresse email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="la la-at"></i>
                                                </span>
                                            </div>
                                            <input name="email" type="text" class="form-control form-control-lg form-control-solid" value="{{session('email')}}" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </form>
                        <!-- Modal-->
                        <form action="{{ url('profil/mise-a-jour/mdp')}}" method="post">
                        @csrf
                        <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Mot de passe</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" class="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Mot de passe précedent</label>
                                            <div class="col-lg-9 col-xl-7">
                                                <input name="mdp_precedent" class="form-control form-control-lg form-control-solid" type="password" />
                                                @if($errors->has('mdp_precedent'))
                                                <div><p class = "text-danger">{{ $errors->first('mdp_precedent') }}</p></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Nouveau mot de passe</label>
                                            <div class="col-lg-9 col-xl-7">
                                                <input name="nouveau_mdp" class="form-control form-control-lg form-control-solid" type="password" />
                                                <span class="form-text text-muted">Saisir votre nouveau mot de passe</span>
                                                @if($errors->has('nouveau_mdp'))
                                                <div><p class = "text-danger">{{ $errors->first('nouveau_mdp') }}</p></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Confirmation du mot de passe</label>
                                            <div class="col-lg-9 col-xl-7">
                                                <input name="password_confirmation" class="form-control form-control-lg form-control-solid" type="password" />
                                                <span class="form-text text-muted">Confirmer votre nouveau mot de passe</span>
                                                @if($errors->has('password_confirmation'))
                                                <div><p class = "text-danger">{{ $errors->first('password_confirmation') }}</p></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">annuler</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!--end::Modal-->
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Personal Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
