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
                            <a href="" class="text-muted">Liste des tickets</a>
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
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Liste des Tickets
                        <span class="d-block text-muted pt-2 font-size-sm">La liste des tickets que chaque client(e) a créé(e) publiquement </span></h3>
                    </div>
                </div>
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
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead>
                            <tr>
                                <th title = "Field #1">N° ticket</th>
                                <th title = "Field #2">Nom</th>
                                <th>Département</th>
                                <th title = "Field #3">Catégorie</th>
                                <th title = "Field #4">Etat</th>
                                <th title = "Field #5">Importance</th>
                                <th title = "Field #6">Date de parution</th>

                                <th title = "Field #7">Sujet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($listeTicket!=null)
                                @foreach($listeTicket as $ticket)
                            <tr>
                                <td><a href = "{{ route('detailticket', ['id_ticket' =>$ticket->id, 'nom_client' => $ticket->nom_client]) }}">{{ $ticket->id }}</a></td>
                                <td>{{  $ticket->nom_client }}</td>
                                <td>{{  $ticket->departement }}</td>
                                <td>{{  $ticket->categorie }}</td>
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

                                <td>{{  $ticket->date_ajout  }}</td>
                                <td>{{  $ticket->sujet }}</td>
                            </tr>
                                @endforeach

                            @endif
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
