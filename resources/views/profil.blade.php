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
                            <a href="" class="text-muted">Détails du compte</a>
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
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <!--begin::Details-->
                    <div class="d-flex mb-9">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            <div class="symbol symbol-50 symbol-lg-120">
                                <span class="font-size-h3 symbol-label font-weight-boldest">{{session('symbole')}}</span>
                            </div>
                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                <span class="font-size-h3 symbol-label font-weight-boldest">{{session('symbole')}}</span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between flex-wrap mt-1">
                                <div class="d-flex mr-3">
                                    <a class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ session('nom')}}</a>
                                    <a>
                                        <i class="flaticon2-correct text-success font-size-h5"></i>
                                    </a>
                                </div>
                                <div class="my-lg-0 my-3">
                                    <a href="{{ url('profil/editer-compte')}}" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Modifier profil</a>
                                </div>
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex flex-wrap justify-content-between mt-1">
                                <div class="d-flex flex-column flex-grow-1 pr-8">
                                    <div class="d-flex flex-wrap mb-4">
                                        <a class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{ session('email')}}</a>
                                        <a class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{ session('profession')}}</a>
                                        <a class="text-dark-50 text-hover-primary font-weight-bold">
                                        <i class="flaticon2-phone mr-2 font-size-lg"></i>{{ session('numero_telephone')}}</a>
                                    </div>
                                    <div class="d-flex flex-wrap mb-4">
                                        <a class="text-dark-50 text-hover-primary font-weight-bold">
                                        <i class="flaticon2-calendar-6 mr-2 font-size-lg"></i>date d'inscription: {{ session('date_inscription')}}</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Card-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-8">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Tous vos tickets</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin: Search Form-->
                            <!--begin::Search Form-->
                            <div class="mb-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" placeholder="Rechercher..." id="kt_datatable_search_query" />
                                                    <span>
                                                        <i class="flaticon2-search-1 text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label class="mr-3 mb-0 d-none d-md-block">Etat</label>
                                                    <select class="form-control" id="kt_datatable_search_status">
                                                        <option value="">Tout</option>
                                                        <option value="1">ouvert</option>
                                                        <option value="2">fermé</option>
                                                        <option value="3">en cours</option>
                                                        <option value="4">non résolu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label class="mr-3 mb-0 d-none d-md-block">Importance:</label>
                                                    <select class="form-control" id="kt_datatable_search_type">
                                                        <option value="">Tout</option>
                                                        <option value="1">Haut</option>
                                                        <option value="2">Moyen</option>
                                                        <option value="3">Bas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th title = "Field #1">N° ticket</th>
                                        <th title = "Field #3">Catégorie</th>
                                        <th title = "Field #4">Confidentialite</th>
                                        <th title = "Field #5">Etat</th>
                                        <th title = "Field #6">Importance</th>
                                        <th title = "Field #7">Date de parution</th>
                                        <th title = "Field #8">Sujet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($listeTicket!=null)
                                    @foreach($listeTicket as $ticket)
                                    <tr>
                                        <td><a href = "{{ route('detailticket', ['id_ticket' =>$ticket->id, 'nom_client' => $ticket->nom_client]) }}">{{ $ticket->id }}</a></td>
                                        <td>{{  $ticket->categorie }}</td>
                                        <td>{{  $ticket->confidentialite }}</td>
                                        <!--begin: Etat-->
                                        @if( $ticket->etat == "ouvert")
                                            <td class="text-right">1</td>
                                        @endif
                                        @if( $ticket->etat == "fermé")
                                            <td class="text-right">2</td>
                                        @endif
                                        @if( $ticket->etat == "en cours")
                                            <td class="text-right">3</td>
                                        @endif
                                        @if( $ticket->etat == "non résolu")
                                            <td class="text-right">4</td>
                                        @endif
                                        <!--end: Etat-->

                                        <!--begin: Importance-->
                                        @if( $ticket->importance == "Haut")
                                            <td class="text-right">1</td>
                                        @endif
                                        @if( $ticket->importance == "Moyen")
                                            <td class="text-right">2</td>
                                        @endif
                                        @if( $ticket->importance == "Bas")
                                            <td class="text-right">3</td>
                                        @endif
                                        <!--end: Importance-->
                                        <td>{{ $ticket->date_ajout }}</td>
                                        <td>{{  $ticket->sujet }}</td>
                                    </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">Statistiques sur vos tickets</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <input type="hidden" id="ticket_ouvert" name="ticket_ouvert"  value= {{ $data_dashboard_nombre['nb_ouvert'] }} />
                                <input type="hidden" id="ticket_fermé" name="ticket_fermé"  value= {{ $data_dashboard_nombre['nb_fermé'] }} />
                                <input type="hidden" id="ticket_en_cours" name="ticket_en_cours"  value= {{ $data_dashboard_nombre['nb_en_cours'] }} />
                                <input type="hidden" id="ticket_non_résolu" name="ticket_non_résolu"  value= {{ $data_dashboard_nombre['nb_non_résolu'] }} />
                                <!--begin::Chart-->
								<div id="chart_12" class="d-flex justify-content-center"></div>
								<!--end::Chart-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
