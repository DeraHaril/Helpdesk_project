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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Catégorie</h5>
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
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!--begin::Card-->
                <a href="{{ url("Appareils")}}">
                    <div class="card card-custom gutter-b card-stretch bg-diagonal bg-diagonal-primary bg-diagonal-r-light rounded ">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7">
                                <span class="svg-icon svg-icon-10x svg-icon-white">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Safe.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M6.5,16 L7.5,16 C8.32842712,16 9,16.6715729 9,17.5 L9,19.5 C9,20.3284271 8.32842712,21 7.5,21 L6.5,21 C5.67157288,21 5,20.3284271 5,19.5 L5,17.5 C5,16.6715729 5.67157288,16 6.5,16 Z M16.5,16 L17.5,16 C18.3284271,16 19,16.6715729 19,17.5 L19,19.5 C19,20.3284271 18.3284271,21 17.5,21 L16.5,21 C15.6715729,21 15,20.3284271 15,19.5 L15,17.5 C15,16.6715729 15.6715729,16 16.5,16 Z" fill="#000000" opacity="0.3" />
                                            <path d="M5,4 L19,4 C20.1045695,4 21,4.8954305 21,6 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6 C3,4.8954305 3.8954305,4 5,4 Z M15.5,15 C17.4329966,15 19,13.4329966 19,11.5 C19,9.56700338 17.4329966,8 15.5,8 C13.5670034,8 12,9.56700338 12,11.5 C12,13.4329966 13.5670034,15 15.5,15 Z M15.5,13 C16.3284271,13 17,12.3284271 17,11.5 C17,10.6715729 16.3284271,10 15.5,10 C14.6715729,10 14,10.6715729 14,11.5 C14,12.3284271 14.6715729,13 15.5,13 Z M7,8 L7,8 C7.55228475,8 8,8.44771525 8,9 L8,11 C8,11.5522847 7.55228475,12 7,12 L7,12 C6.44771525,12 6,11.5522847 6,11 L6,9 C6,8.44771525 6.44771525,8 7,8 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::User-->
                            <!--begin::Name-->
                            <div class="my-2">
                                <p class="text-white font-weight-bold text-hover-primary font-size-h4">Appareil de visioconférence</p>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Body-->
                    </div>
                </a>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!--begin::Card-->
                <a href="#">
                    <div class="card card-custom gutter-b card-stretch bg-diagonal bg-diagonal-white bg-diagonal-r-dark rounded">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7 pb-2">
                                <span class="svg-icon svg-icon-dark-75 svg-icon-10x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo13\dist/../src/media/svg/icons\Devices\Video-camera.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <rect fill="#000000" x="2" y="6" width="13" height="12" rx="2"/>
                                        <path d="M22,8.4142119 L22,15.5857848 C22,16.1380695 21.5522847,16.5857848 21,16.5857848 C20.7347833,16.5857848 20.4804293,16.4804278 20.2928929,16.2928912 L16.7071064,12.7071013 C16.3165823,12.3165768 16.3165826,11.6834118 16.7071071,11.2928877 L20.2928936,7.70710477 C20.683418,7.31658067 21.316583,7.31658098 21.7071071,7.70710546 C21.8946433,7.89464181 22,8.14899558 22,8.4142119 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </div>
                            <!--end::User-->
                            <!--begin::Name-->
                            <div class="my-2">
                                <p class="text-dark font-weight-bold text-hover-primary font-size-h4">Caméra de surveillance</p>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Body-->
                    </div>
                </a>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!--begin::Card-->
                <a href="#">
                    <div class="card card-custom gutter-b card-stretch bg-diagonal bg-diagonal-success bg-diagonal-r-white rounded">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7 pb-2">
                                <span class="svg-icon svg-icon-white svg-icon-10x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo13\dist/../src/media/svg/icons\Communication\Call#1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M11.914857,14.1427403 L14.1188827,11.9387145 C14.7276032,11.329994 14.8785122,10.4000511 14.4935235,9.63007378 L14.3686433,9.38031323 C13.9836546,8.61033591 14.1345636,7.680393 14.7432841,7.07167248 L17.4760882,4.33886839 C17.6713503,4.14360624 17.9879328,4.14360624 18.183195,4.33886839 C18.2211956,4.37686904 18.2528214,4.42074752 18.2768552,4.46881498 L19.3808309,6.67676638 C20.2253855,8.3658756 19.8943345,10.4059034 18.5589765,11.7412615 L12.560151,17.740087 C11.1066115,19.1936265 8.95659008,19.7011777 7.00646221,19.0511351 L4.5919826,18.2463085 C4.33001094,18.1589846 4.18843095,17.8758246 4.27575484,17.613853 C4.30030124,17.5402138 4.34165566,17.4733009 4.39654309,17.4184135 L7.04781491,14.7671417 C7.65653544,14.1584211 8.58647835,14.0075122 9.35645567,14.3925008 L9.60621621,14.5173811 C10.3761935,14.9023698 11.3061364,14.7514608 11.914857,14.1427403 Z" fill="#000000"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </div>
                            <!--end::User-->
                            <!--begin::Name-->
                            <div class="my-2">
                                <p class="text-white font-weight-bold text-hover-primary font-size-h4">Combiné téléphonique</p>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Body-->
                    </div>
                </a>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!--begin::Card-->
                <a href="#">
                    <div class="card card-custom gutter-b card-stretch bg-diagonal bg-diagonal-danger bg-diagonal-r-dark-15 rounded">
                        <!--begin::Body-->
                        <div class="card-body text-center pt-4">
                            <!--begin::User-->
                            <div class="mt-7 pb-2">
                                <span class="svg-icon svg-icon-black svg-icon-10x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo13\dist/../src/media/svg/icons\Devices\Hard-drive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M2,13 L22,13 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,13 Z M18.5,18 C19.3284271,18 20,17.3284271 20,16.5 C20,15.6715729 19.3284271,15 18.5,15 C17.6715729,15 17,15.6715729 17,16.5 C17,17.3284271 17.6715729,18 18.5,18 Z M13.5,18 C14.3284271,18 15,17.3284271 15,16.5 C15,15.6715729 14.3284271,15 13.5,15 C12.6715729,15 12,15.6715729 12,16.5 C12,17.3284271 12.6715729,18 13.5,18 Z" fill="#000000"/>
                                        <path d="M5.79268604,8 L18.207314,8 C18.5457897,8 18.8612922,8.17121884 19.0457576,8.45501165 L22,13 L2,13 L4.95424243,8.45501165 C5.13870775,8.17121884 5.45421032,8 5.79268604,8 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            </div>
                            <!--end::User-->
                            <!--begin::Name-->
                            <div class="my-2">
                                <p class="text-dark font-weight-bold text-hover-primary font-size-h4">Appareils de connexion internet</p>
                            </div>
                            <!--end::Name-->
                        </div>
                        <!--end::Body-->
                    </div>
                </a>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
    <!--end::Container-->
</div>
</div>
@endsection
