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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Tableau de bord</h5>
                    <!--end::Page Title-->
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
            <div class="col d-flex justify-content-center">
                <!-- ============================================================== -->
                <!-- total revenue  -->
                <!-- ============================================================== -->


                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- category revenue  -->
                <!-- ============================================================== -->
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <input type="hidden" id="ticket_ouvert" name="ticket_ouvert"  value= {{ $data_dashboard_Percentage['P_ouvert'] }} />
                    <input type="hidden" id="ticket_fermé" name="ticket_fermé"  value= {{ $data_dashboard_Percentage['P_fermé'] }} />
                    <input type="hidden" id="ticket_en_cours" name="ticket_en_cours"  value= {{ $data_dashboard_Percentage['P_en_cours'] }} />
                    <input type="hidden" id="ticket_non_résolu" name="ticket_non_résolu"  value= {{ $data_dashboard_Percentage['P_non_résolu'] }} />

                    <div class="card">
                        <h5 class="card-header">Etat des tickets </h5>
                        <div class="card-body">
                            <div id="morris_donut"></div>
                            <div class="chart-widget-list">
                                <p>
                                    <span class="fa-xs text-primary mr-1 legend-title"><i class="fa fa-fw fa-square-full" style="color:#5969ff"></i></span>
                                    <span class="legend-text">Ouvert</span>
                                    <span class="float-right">{{ $data_dashboard_nombre['nb_ouvert']}}</span>
                                </p>
                                <p>
                                    <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full" style="color:#ff407b"></i></span>
                                    <span class="legend-text">Fermé</span>
                                    <span class="float-right">{{ $data_dashboard_nombre['nb_fermé']}}</span>
                                </p>
                                <p>
                                    <span class="fa-xs text-brand mr-1 legend-title"><i class="fa fa-fw fa-square-full" style="color:#ffc750"></i></span>
                                    <span class="legend-text">Non résolu</span>
                                    <span class="float-right">{{ $data_dashboard_nombre['nb_non_résolu']}}</span>
                                </p>
                                <p class="mb-0">
                                    <span class="fa-xs text-info mr-1 legend-title"><i class="fa fa-fw fa-square-full" style="color:#25d5f2"></i></span>
                                    <span class="legend-text">En cours</span>
                                    <span class="float-right">{{ $data_dashboard_nombre['nb_en_cours']}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="mb-0">
                                <span class="fa-xs text-info mr-1 legend-title"></span>
                                <span class="legend-text font-weight-bolder">TOTAL</span>
                                <span class="float-right legend-text font-weight-bolder">{{ $data_dashboard_nombre['nb_total']}}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- end category revenue  -->
                <!-- ============================================================== -->
            </div>
        </div>
    </div>
</div>

@endsection
