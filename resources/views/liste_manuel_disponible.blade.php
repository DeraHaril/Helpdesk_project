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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Liste des appareils de visioconférence</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <!--begin::Top-->
                    <div class="d-flex">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-120">
                                <img alt="Pic" src="assets/media//Materiel/Huawei IdeaHub.PNG" />
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin: Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                <!--begin::User-->
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <a href="{{ url("manuel")}}" class="d-flex align-items-center text-dark text-hover-primary font-size-h3 font-weight-bold mr-3">HUAWEI IdeaHub
                                    <!--end::Name-->
                                </div>
                                <!--begin::User-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <!--begin::Description-->
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5 font-size-h6">
                                    Un outil de productivité pour le bureau intelligent - regroupe l’écriture intelligente, la vidéoconférence haute définition (HD) et le partage sans fil
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Top-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>
@endsection
