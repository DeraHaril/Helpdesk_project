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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Manuel d'utilisation</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Section-->
    <div class="container mb-8">
        <div class="card">
            <div class="card-body">
                <div class="p-6">
                    <h2 class="text-dark mb-8">HUAWEI IdeaHub Pro, S, and Entreprise</h2>
                    <div class="row">
                        <div class="col-lg-3">
                            <!--begin::Navigation-->
                            <ul class="navi navi-link-rounded navi-accent navi-hover flex-column mb-8 mb-lg-0" role="tablist">
                                <!--begin::Nav Item-->
                                <li class="navi-item mb-2">
                                    <a class="navi-link" data-toggle="tab" href="#">
                                        <span class="navi-text text-dark-50 font-size-h5 font-weight-bold">Upgrade Check</span>
                                    </a>
                                </li>
                                <!--end::Nav Item-->
                                <!--begin::Nav Item-->
                                <li class="navi-item mb-2">
                                    <a class="navi-link active" data-toggle="tab" href="#">
                                        <span class="navi-text text-dark font-size-h5 font-weight-bold">Upgrade Procedure</span>
                                    </a>
                                </li>
                                <!--end::Nav Item-->
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <div class="col-lg-7">
                            <!--begin::Accordion-->
                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample7">
                                <!--begin::Item-->
                                <img src="assets/media/Materiel/Manuel/Entete.png" alt="IdeaHub">
                            </div>
                            <!--end::Accordion-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Section-->
    <div class="container mb-8">
        <div class="card card-custom p-6">
            <div class="card-body">
                <!--begin::Heading-->
                <h2 class="text-dark mb-8">Upgrade check</h2>
                <!--end::Heading-->
                <!--begin::Content-->
                <div class="text-dark-50 line-height-lg mb-8">
                    <p class="bg-success text-white py-2 px-4 rounded">You can view the current endpoint version information to determine whether to upgrade the endpoint. HUAWEI IdeaHub supports multiple upgrade modes. You can select a proper upgrade mode based on the flowchart in this chapter</p>
                </div>
                <!--end::Content-->
                <!--begin::Content-->
                <h4 class="font-weight-bold text-dark mb-4">Querying the IdeaHub Version</h4>
                <div class="text-dark-50 line-height-lg">
                    <p>Choose <b>Settings > Device Info</b> in the lower right corner of the home screen to check the endpoint's software version.</p>
                    <img src="assets/media/Materiel/Manuel/photo 1.png" alt="device info">
                </div>
                <!--end::Content-->
                <!--begin::Content-->
                <h4 class="font-weight-bold text-dark mb-4">Supported Upgrade Modes</h4>
                <div class="text-dark-50 line-height-lg">
                    <p>If your version is earlier than 21.0.100 or you have activated the endpoint on the CloudVC network, select a proper mode to upgrade the endpoint software by following instructions in the HUAWEI IdeaHub Upgrade Guideand following flowchart.</p>
                    <img src="assets/media/Materiel/Manuel/Diagramme.png" alt="Diagramme">
                </div>
                <div style="height: 30px"></div>
                <div class="col-sm-7">
                    <p class="bg-secondary py-2 px-4 rounded text-dark-50 line-height-lg">
                        <b>Note</b><br/>
                        Ensure that the network is connected during the upgrade.</p>
                    <!--end::Content-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Section-->
    <!--begin::Section-->
    <div class="container mb-8">
        <div class="card card-custom p-6">
            <div class="card-body">
            <!--begin::Content-->
                <h2 class="text-dark mb-4">Upgrade procedure</h2>
                <!--begin::Content-->
                <h4 class="line-height-lg mb-8 text-dark mb-4">Upgrade on the touchscreen</h4>
                <p class="bg-secondary py-2 px-4 rounded text-dark-50 line-height-lg">
                    <b>Note</b><br/>
                    In 21.0.200 and later versions, the Auto Update function can be enabled. The endpoint automatically detects the new version. Once a new version is detected, the endpoint automatically downloads the updates and upgrades to the new version in the idle state.</p>
                <h6><b>1.</b> Check the endpoint activation status.</h6>
                <div class="text-dark-50 line-height-lg">
                    <p>Choose <b>Settings > Advanced > Enterprise Service </b>in the lower right corner of the home screen to check whether the endpoint is activated.
                        If the endpoint is not activated, a QR code will be displayed. If the endpoint has been activated, check the access platform.
                        </p>
                    <img src="assets/media/Materiel/Manuel/Entrerpise service.png" alt="entreprise service">
                </div>
                <div style="height: 30px"></div>
                <p class="text-dark-50 line-height-lg">
                    If the endpoint has been activated on the CloudVC network, it cannot be upgraded on the touchscreen. There is no such restriction when the HUAWEI CLOUD Meeting networking is used.
                    When the endpoint is not activated, the upgrade can be performed on the touchscreen.
                </p>
                <h6><b>2.</b> Check for updates.</h6>
                <div class="text-dark-50 line-height-lg">
                    <p>Choose <b>Settings > System Upgrade</b> to access the upgrade screen. By default, the system automatically checks whether a new version is available. The initial status of the <b>Auto Update</b> function during the system upgrade is consistent with the selection in <b>Wizard</b>.
                        </p>
                    <img src="assets/media/Materiel/Manuel/System upgrade.png" alt="entreprise service">
                </div>
                <div style="height: 30px"></div>
                <h6><b>3.</b> Download the update package.</h6>
                <div class="text-dark-50 line-height-lg">
                    <p>If a new version is detected, you can tap <b>Download</b> and the download progress is displayed on the endpoint screen. <br/>
                        During the download, you can tap <b>Cancel</b> to terminate the upgrade.
                    </p>
                </div>
                <h6><b>4.</b> Install the new version.</h6>
                <div class="text-dark-50 line-height-lg">
                    <p>After the upgrade package is downloaded and verified, the <b>Downloaded</b> dialog box is displayed on the endpoint.
                    </p><br/>
                    <p>•	If you select Cancel, the endpoint deletes all the downloaded upgrade files and the upgrade is stopped.
                    </p>
                    <p>•	If you select Later, the endpoint does not restart. The upgrade will be completed after the endpoint restarts. Alternatively, when the endpoint triggers the upgrade again, a dialog box is displayed, indicating that the download is complete and you need to select again.
                    </p>
                    <p>•	If you select Upgrade Now, the endpoint restarts to complete the upgrade.
                    </p>
                    <p>•	If you do not perform any operation, the endpoint automatically restarts in 180 seconds to complete this upgrade.
                    </p>
                </div>
            <!--end::Content-->
            </div>
        </div>
    </div>
    <!--end::Section-->
</div>
@endsection
