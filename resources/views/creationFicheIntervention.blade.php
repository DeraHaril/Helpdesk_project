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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">INTERVENTION</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
						<li class="breadcrumb-item text-muted">
							<a class="text-muted">Fiche d'intervention</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a class="text-muted">Création de fiche</a>
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
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Création de fiche d'intervention</h3>
                </div>
                <!--begin::Form-->
                <form  method="POST" action="{{ url('insertionIntervention', ['id_ticket' => $id_ticket]) }}">
                @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label text-left col-lg-3 col-sm-12">Intervenant(s)/(es) concerné(s)(es)</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <select class="form-control select2" id="kt_select2_3" name="intervenant[]" multiple="multiple">
                                    @foreach($intervenant as $liste_intervenant)
                                    <optgroup label="{{ $liste_intervenant->poste }}">
                                        <option value="{{ $liste_intervenant->nom_intervenant}}">{{ $liste_intervenant->nom_intervenant}}</option>
                                    </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-left col-lg-3 col-sm-12">Début/Fin d'intervention</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group" >
                                            <input type="datetime-local" name="date_debut_intervention" class="form-control" placeholder="Début"/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="datetime-local" name="date_fin_intervention" class="form-control" placeholder="Fin"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-left col-lg-3 col-sm-12">Nature de l'intervention</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div class="radio-inline">
                                    <label class="radio radio-primary" >
                                        <input type="radio" name="nature_intervention" value="Par ticket"/>
                                        <span></span>
                                        Par ticket
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="nature_intervention" checked="checked" value="Sur place"/>
                                        <span></span>
                                        Sur place
                                    </label>
                                    <label class="radio radio-primary">
                                        <input type="radio" name="nature_intervention" value="Par réunion en ligne"/>
                                        <span></span>
                                        Par réunion en ligne
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-left">Etat apres intervention</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <select class="form-control" id="kt_bootstrap_select" name="etat">
                                    <option value="en fonction">en fonction</option>
                                    <option value="non résolu">non résolu</option>
                                </select>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="form-group row">
                            <label class="col-form-label text-left col-lg-3 col-sm-12">Observation</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea name="observation" class="form-control form-control-solid" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                <button type="reset" class="btn btn-info mr-2">Réinitialiser</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
