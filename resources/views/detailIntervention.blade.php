@extends('header')

@section('contenu')
<div class="row"  >
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container" ng-controller="listController">
                    <div class="card card-custom">
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Fiche d'intervention</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Cette fiche résume le résultat d'une intervention faite par les intervenants</span>
                                </div>
                                <div class="card-toolbar">
                                @foreach($detailIntervention as $intervention)
                                <form action="{{ route('downloadPDFFicheIntervention', ['id_intervention' =>$intervention->id] )}}" method="get">
                                    <button type="submit" class="btn btn-success mr-2" >Enregistrer fiche</button>
                                </form>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach($detailIntervention as $intervention)
                        <div class="card-body p-0" id="exportthis">
                            <!--begin::Invoice-->
                            <div class="row justify-content-center pt-8 px-8 pt-md-27 px-md-0">
                                <div class="col-md-9">
                                    <!-- begin: Invoice header-->
                                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                        <h1 class="display-4 ">Intervention</h1>
                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <span class="d-flex flex-column align-items-md-end font-size-h5 font-weight-bold text-muted">
                                                <span>Ticket: {{ $intervention->id_ticket }}</span>
                                                <span>{{ $intervention->date_creation_fiche}}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end: Invoice header-->
                                    <!--begin: Invoice body-->
                                    <div class="row border-bottom pb-10">
                                        <div class="col-md-9 py-md-10 pr-md-10">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-dark-50 font-size-lg font-weight-bold mb-3 text-left">Début d'intervention</th>
                                                            <th class="text-dark-50 font-size-lg font-weight-bold mb-3 text-right">Fin d'intervention</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="font-weight-bolder font-size-lg">
                                                            <td class="border-top-0 pl-0 pt-7 d-flex align-items-center">{{ $intervention->date_debut_intervention }}</td>
                                                            <td class="text-right pt-7">{{ $intervention->date_fin_intervention }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="border-bottom w-100 mt-7 mb-13"></div>
                                            <div class="text-dark-50 font-size-lg font-weight-bold mb-3">OBSERVATION</div>
                                            <div class="font-size-lg font-weight-normal">

                                                <?php echo html_entity_decode($intervention->observation) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3 border-left-md pl-md-10 py-md-10 text-left">
                                            <!--begin::Total Amount-->
                                            <div class="text-dark-50 font-size-lg font-weight-bold mb-3">INTERVENANT(S)</div>
                                            <div class="font-size-lg font-weight-bold mb-10">
                                                @for($i=0; $i<count($listeIntervenants); $i++)
                                                <br />-{{ $listeIntervenants[$i] }}
                                                @endfor
                                            </div>
                                            <!--end::Total Amount-->
                                            <div class="border-bottom w-100 mb-16"></div>
                                            <!--begin::Invoice To-->
                                            <div class="text-dark-50 font-size-lg font-weight-bold mb-3">NATURE DE L'INTERVENTION</div>
                                            <div class="font-size-lg font-weight-bold mb-10">
                                                {{ $intervention->nature_intervention }}
                                            </div>
                                            <!--end::Invoice To-->
                                            <!--begin::Invoice No-->
                                            <div class="text-dark-50 font-size-lg font-weight-bold mb-3">ETAT APRES INTERVENTION</div>
                                            <div class="font-size-lg font-weight-bold mb-10 text-info">{{ $intervention->etat_apres_intervention }}</div>
                                            <!--end::Invoice No-->
                                        </div>
                                    </div>
                                    <div style = "height:50px">

                                    </div>
                                    @foreach ($responsable_ticket as $responsable)
                                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <span class="d-flex flex-column align-items-md-center font-weight-bold">
                                                <p><u>auteur du ticket</u></p> <br/>
                                                <p><strong>{{ $responsable->nom_client }}</strong></p>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <span class="d-flex flex-column align-items-md-center font-weight-bold">
                                                <p><u>auteur de la fiche d'intervention</u></p> <br/>
                                                <p><strong>{{ $responsable->nom_intervenant }}</strong></p>
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach

                                    <!--end: Invoice body-->
                                </div>
                            </div>
                            <!-- begin: Invoice action-->

                            <!-- end: Invoice action-->
                            <!--end::Invoice-->
                        </div>
                        @endforeach
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
    </div>
</div>
@endsection
