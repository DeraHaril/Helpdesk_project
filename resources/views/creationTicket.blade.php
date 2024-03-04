@extends('header')

@section('contenu')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">TICKET</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted">Création</a>
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
                    <h3 class="card-title">Création de Ticket</h3>
                </div>
                <!--begin::Form-->
                <form action = "{{ url('insertionTicket')}}" method="POST" class="form" id="kt_form" >
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Sujet</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input name="sujet" type="text" class="form-control" placeholder="Sujet"/>
                            </div>
                            <span class="form-text text-muted">le sujet de votre ticket</span>
                        </div>
                        @if($errors->has('sujet'))
                                <div>{{ $errors->first('sujet') }}</div>
                                @endif
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Département</label>
                        <div class="col-lg-7 col-md-9 col-sm-12">
                            <select class="form-control" id="kt_bootstrap_select" name="departement">
                                <option value="Ministère du développement Numérique, le transformation Digitale, des Postes et des Télécommunications">
                                    Ministère du développement Numérique, le transformation Digitale, des Postes et des Télécommunications
                                </option>
                                <option value="Ministère de la santé">
                                    Ministère de la Santé
                                </option>
                                <option value="Ministère de la Défense nationale">
                                    Ministère de la Défense nationale
                                </option>
                                <option value="Ministère des Affaires étrangères">
                                    Ministère des Affaires étrangères
                                </option>
                                <option value="Ministère de de l’Économie et des Finances">
                                    Ministère de l’Économie et des Finances
                                </option>
                                <option value="Ministère de la Justice">
                                    Ministère de la Justice
                                </option>
                                <option value="Ministère de l’Intérieur et de la Décentralisation">
                                    Ministère de l’Intérieur et de la Décentralisation
                                </option>
                                <option value="Ministère de la Sécurité publique">
                                    Ministère de la Sécurité publique
                                </option>
                                <option value="Ministère de l’Aménagement du territoire, de l’Habitat et des Travaux publics">
                                    Ministère de l’Aménagement du territoire, de l’Habitat et des Travaux publics
                                </option>
                                <option value="Ministère de l’Éducation nationale et de l’Enseignement technique et professionnel">
                                    Ministère de l’Éducation nationale et de l’Enseignement technique et professionnel
                                </option>
                                <option value="Ministère de l’Agriculture, de l’Élevage et de la Pêche">
                                    Ministère de l’Agriculture, de l’Élevage et de la Pêche
                                </option>
                                <option value="Ministère de l’Énergie et des Hydrocarbures">
                                    Ministère de l’Énergie et des Hydrocarbures
                                </option>
                                <option value="Ministère des Mines et des Ressources stratégiques">
                                    Ministère des Mines et des Ressources stratégiques
                                </option>
                                <option value="Ministère des Transports, du Tourisme et de la Météorologie">
                                    Ministère des Transports, du Tourisme et de la Météorologie
                                </option>
                                <option value="Ministère du Travail, de l’Emploi, de la Fonction publique et des Lois sociales">
                                    Ministère du Travail, de l’Emploi, de la Fonction publique et des Lois sociales
                                </option>
                                <option value="Ministère de l’Enseignement supérieur et de la Recherche scientifique">
                                    Ministère de l’Enseignement supérieur et de la Recherche scientifique
                                </option>
                                <option value="Ministère de l’Industrie, du Commerce, et de l’Artisanat">
                                    Ministère de l’Industrie, du Commerce, et de l’Artisanat
                                </option>
                                <option value="Ministère de l’Environnement et du Développement durable">
                                    Ministère de l’Environnement et du Développement durable
                                </option>
                                <option value="Ministère de la Population, de la Protection sociale et de la Promotion de la Femme">
                                    Ministère de la Population, de la Protection sociale et de la Promotion de la Femme
                                </option>
                                <option value="Ministère de la Jeunesse et des Sports">
                                    Ministère de la Jeunesse et des Sports
                                </option>
                                <option value="Ministère de la Communication et de la Culture">
                                    Ministère de la Communication et de la Culture
                                </option>
                            </select>
                            <span class="form-text text-muted">choisir une des départements vous concernant</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12 text-right">Catégorie</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control selectpicker" id="kt_bootstrap_select" name="categorie">
                                <option value="réseau">Réseau</option>
                                <option value="Logiciel">Logiciel</option>
                                <option value="Site web">Site web</option>
                                <option value="matériel informatique">Matériel Informatique</option>
                            </select>
                            <span class="form-text text-muted">choisir une des catégories présentes</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Importance</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control selectpicker" data-size="4" name="importance">
                                <option value="Haut">Haut</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Bas">Bas</option>
                            </select>
                            <span class="form-text text-muted">Définir l'importance de votre problème</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Confidentialité</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <select class="form-control selectpicker" data-size="4" name="confidentialite">
                                <option value="Public">Public</option>
                                <option value="Privee">Privée</option>
                            </select>
                            <span class="form-text text-muted">Définir la confidentialité de votre ticket</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-left col-lg-3 col-sm-12">Référence de votre ticket (facultatif)</label>
                        <div class="col-lg-6 col-md-9 col-sm-12">
                            <select class="form-control select2" id="kt_select2_3" name="tickets[]" multiple="multiple">
                                @foreach($ticket as $liste_ticket)
                                <optgroup label="{{ $liste_ticket->id}} :{{ $liste_ticket->sujet}}">
                                    <option value="{{ $liste_ticket->id}}">{{ $liste_ticket->id}}</option>
                                </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-10"></div>
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12">Description</label>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <textarea name="description" class="summernote" id="kt_summernote_1"></textarea>
                            <span class="form-text text-muted">Bref description de votre problème</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-9 ml-lg-auto">
                            <button type="submit" class="btn btn-primary mr-2">Valider</button>
                            <button type="reset" class="btn btn-light-primary">Annuler</button>
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
