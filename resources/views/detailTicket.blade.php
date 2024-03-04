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
                            <a href="" class="text-muted">Détail du ticket </a>
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
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <!--begin::Top-->
                    <div class="d-flex">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-7">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-75">
                                    <span class="symbol-label font-size-h4">{{$symbole}}</span>
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin: Info-->
                        <div class="flex-grow-1">
                            @foreach($detailClient as $client)
                            <!--begin::Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                <!--begin::User-->
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $client->nom_client }}
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                    <!--end::Name-->
                                    <!--begin::Contacts-->
                                    <div class="d-flex flex-wrap my-2">
                                        <a class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                    <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>{{ $client->email }}</a>
                                        <a class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <polygon fill="#000000" opacity="0.3" points="6 3 18 3 20 6.5 4 6.5"/>
                                                    <path d="M6,5 L18,5 C19.1045695,5 20,5.8954305 20,7 L20,19 C20,20.1045695 19.1045695,21 18,21 L6,21 C4.8954305,21 4,20.1045695 4,19 L4,7 C4,5.8954305 4.8954305,5 6,5 Z M9,9 C8.44771525,9 8,9.44771525 8,10 C8,10.5522847 8.44771525,11 9,11 L15,11 C15.5522847,11 16,10.5522847 16,10 C16,9.44771525 15.5522847,9 15,9 L9,9 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>{{ $client->profession }}</a>
                                        <a class="text-muted text-hover-primary font-weight-bold">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M11.613922,13.2130341 C11.1688026,13.6581534 10.4887934,13.7685037 9.92575695,13.4869855 C9.36272054,13.2054673 8.68271128,13.3158176 8.23759191,13.760937 L6.72658218,15.2719467 C6.67169475,15.3268342 6.63034033,15.393747 6.60579393,15.4673862 C6.51847004,15.7293579 6.66005003,16.0125179 6.92202169,16.0998418 L8.27584113,16.5511149 C9.57592638,16.9844767 11.009274,16.6461092 11.9783003,15.6770829 L15.9775173,11.6778659 C16.867756,10.7876271 17.0884566,9.42760861 16.5254202,8.3015358 L15.8928491,7.03639343 C15.8688153,6.98832598 15.8371895,6.9444475 15.7991889,6.90644684 C15.6039267,6.71118469 15.2873442,6.71118469 15.0920821,6.90644684 L13.4995401,8.49898884 C13.0544207,8.94410821 12.9440704,9.62411747 13.2255886,10.1871539 C13.5071068,10.7501903 13.3967565,11.4301996 12.9516371,11.8753189 L11.613922,13.2130341 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>{{ $client->numero_telephone }}</a>
                                    </div>
                                    <!--end::Contacts-->
                                </div>
                                @if(session('nom') == $client->nom_client || session('role') == "intervenant")

                                <div class="dropdown">
                                    <div class="dropdown dropdown-inline">
                                        <a class="btn btn-light-primary font-weight-bold dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>Action(s)
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md py-5">
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a class="navi-link" data-toggle="modal" data-target="#exampleModalSizeSm" >
                                                        <span class="navi-icon"><i class="fa fa-cog text-info"></i></span>
                                                        <span class="navi-text" > Modifier</span>
                                                    </a>
                                                </li>
                                                @if(session('role')=='client')
                                                <li class="navi-item">
                                                    <a class="navi-link" data-toggle="modal" data-target="#supprimer">
                                                        <span class="navi-icon"><i class="fas fa-trash-alt text-danger"></i></span>
                                                        <span class="navi-text">Supprimer Ticket</span>
                                                    </a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Modal-->
                                    <div class="modal fade" id="exampleModalSizeSm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeSm" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier le ticket</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>
                                            @foreach($detailTicket as $ticket)
                                                @if(session('role')=='intervenant')
                                                <div class="modal-body">
                                                <form action="{{ route('maj-ticket',['idTicket' => $ticket->id])}}" method="POST">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-lg-3 col-sm-12 text-right">état</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <select class="form-control selectpicker" name="etat">état
                                                                <option value="ouvert">ouvert</option>
                                                                <option value="en cours">en cours</option>
                                                                <option value="fermé">fermé</option>
                                                                <option value="non résolu">non résolu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">Valider</button>
                                                </div>
                                                </form>
                                                @endif
                                                @if(session('role')=='client')
                                                <div class="modal-body">
                                                @foreach($detailClient as $client)
                                                <form action="{{ route('mise-a-jour-reference-conf',['idTicket' => $ticket->id, 'nom_client' => $client->nom_client])}}" method="POST">
                                                @endforeach
                                                @csrf
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-left col-lg-3 col-sm-12">Confidentialité</label>
                                                        <div class="col-lg-4 col-md-9 col-sm-12">
                                                            <select class="form-control selectpicker" title="Choisir " name="confidentialite">
                                                                <option value="Public">Public</option>
                                                                <option value="Privee">Privée</option>
                                                            </select>
                                                            <span class="form-text text-muted">Définir la confidentialité de votre ticket</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-left col-lg-3 col-sm-12">Référence de votre ticket (facultatif)</label>
                                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                                            <select class="form-control select2" id="kt_select2_3" name="tickets[]" multiple="multiple" placeholder="choisir">
                                                                <option label="Label"></option>
                                                                @foreach($ticket_reference_update as $liste_ticket)
                                                                <optgroup label="{{ $liste_ticket->id}} :{{ $liste_ticket->sujet}}">
                                                                    <option value="{{ $liste_ticket->id}}">{{ $liste_ticket->id}}</option>
                                                                </optgroup>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label text-left col-lg-3 col-sm-12"></label>
                                                        <div class="col-lg-6 col-md-9 col-sm-12">
                                                            <a class="navi-link btn btn-light-danger font-weight-bold mr-2" data-toggle="modal" data-target="#supprimerReference">
                                                                <i class="fas fa-trash-alt"></i> Supprimer le(s) ticket(s) de référence
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">Valider</button>
                                                </div>
                                                </form>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="supprimer" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="text-center display-5">Voulez vous vraiment vouloir supprimer ce ticket?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    @foreach($detailTicket as $ticket)
                                                    <form action="{{ route('suppression-ticket', ['id_ticket'=> $ticket->id])}}">
                                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary font-weight-bold">Supprimer</button>
                                                    </form>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="supprimerReference" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="text-center display-5">Voulez vous vraiment vouloir supprimer les tickets de référence sur ce ticket?</h3>
                                                </div>
                                                <div class="modal-footer">
                                                    @foreach($detailTicket as $ticket)
                                                        @foreach($detailClient as $client)
                                                        <form action="{{ route('suppression-reference-conf' ,['idTicket' => $ticket->id, 'nom_client' => $client->nom_client])}}">
                                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary font-weight-bold">Supprimer</button>
                                                        </form>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!--begin::User-->
                            </div>
                            <!--end::Title-->
                            @endforeach
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Top-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid my-7"></div>
                    <!--end::Separator-->
                    <!--begin::Bottom-->
                    <div class="d-flex align-items-center flex-wrap">
                    @foreach($detailTicket as $ticket)
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon2-placeholder icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Département</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-info font-weight-bold">{{ $ticket->departement }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon2-layers-1 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Catégorie</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">{{ $ticket->categorie }}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon2-lock icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Confidentialité</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">{{ $ticket->confidentialite }}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon2-graphic icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Etat</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-success font-weight-bold">{{ $ticket->etat }}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon2-calendar-8 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">Date de publication</span>
                                <span class="text-dark-50 font-weight-bold">{{ $ticket->date_ajout }}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon2-files-and-folders icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">Ticket(s) de référence</span>
                                @if (isset($reference_ticket))
                                    @foreach ( $reference_ticket as $reference)
                                        @foreach($detailClient as $client)
                                        <span class="text-dark-50 font-weight-bold"><a href="{{ route('detailticket',['id_ticket' =>$reference->id_ticket, 'nom_client' => $client->nom_client]) }}">{{ $reference->id_ticket }}</a></span>
                                        @endforeach
                                    @endforeach
                                @else
                                <span class="text-dark-50 font-weight-bold">Aucun</span>
                                @endif
                            </div>
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--end::Bottom-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid my-7"></div>
                    <!--end::Separator-->
                    <!--begin::Header-->
                    <div class="d-flex align-items-center justify-content-between flex-wrap card-spacer-x py-5">
                        <!--begin::Title-->
                        <div class="d-flex align-items-center mr-2 py-2">
                            <div class="font-weight-bold font-size-h3 mr-3">{{ $ticket->sujet }}</div>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Messages-->
					<div class="mb-3">
						<div class="cursor-pointer shadow-xs toggle-on" data-inbox="message">
							<div class="card-spacer-x py-3 toggle-off-item">
								<p><?php echo html_entity_decode($ticket->description)?></p>
							</div>
                        </div>
                    @endforeach
					</div>
                    <!--end::Messages-->
                </div>
            </div>
            <!--end::Profile Personal Information-->
            <div class = "row">
                <!--begin::Profile Personal Information-->
                <div class = "col-md-12">
                    <div class = "card card-custom gutter-b">
                        <div class = "card-body">
                            <ul class="nav nav-tabs nav-tabs-line justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Intervention</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-5" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
                                    @if($listeNotes!=null)
                                    @foreach($listeNotes as $note)
                                    <div class="cursor-pointer shadow-xs toggle-off" data-inbox="message" >
                                        <!--begin::Message Heading-->
                                        <div class="d-flex card-spacer-x py-6 flex-column flex-md-row flex-lg-column flex-xxl-row justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="symbol symbol-35 mr-3" data-toggle="expand">
                                                    @php
                                                        $array = str_split($note->repondeur);
                                                        $symbole = $array[0];
                                                    @endphp
                                                    <span class="symbol-label font-size-h6">{{ $symbole }}</span>
                                                </span>
                                                <div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
                                                    <div class="d-flex" data-toggle="expand">
                                                        <a class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">{{ $note->repondeur }}</a>
                                                        <div class="font-weight-bold text-muted">
                                                        <span class="label label-success label-dot mr-2"></span>{{ $note->poste }}</div>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="text-muted font-weight-bold toggle-on-item" data-toggle="expand">{{ $note->date_publication }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex my-2 my-xxl-0 align-items-md-center align-items-lg-start align-items-xxl-center flex-column flex-md-row flex-lg-column flex-xxl-row">
                                                <div data-toggle="expand">
                                                    <?php echo html_entity_decode($note->note)?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Message Heading-->
                                    </div>
                                    @endforeach
                                    @else
                                    <h3 class="font-weight-light text-center">Aucune réponse</h3>
                                    @endif
                                        <div class="separator separator-solid">
                                    </div>
                                    @foreach($detailClient as $client)
                                    @if(session()->has('id'))
                                        @if(session('nom') == $client->nom_client || session('role') == "intervenant")
                                            <div class="container">
                                                @foreach($detailTicket as $ticket)
                                                <h4>Répondre:</h4>
                                                <form action="{{ route('creation-note', ['id_ticket' => $ticket->id, 'nom_repondeur' => session('nom')])}}">
                                                @endforeach
                                                    <textarea name="note" class="summernote" id="kt_summernote_1"></textarea>
                                                        <p>réponse ici</p>
                                                    </textarea>
                                                <span class="form-text text-muted"></span>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-lg-8"></div>
                                                        <div class="col-lg-9">
                                                        <button type="submit" class="btn btn-primary btn-shadow font-weight-bold mr-2">Envoyer</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        @endif
                                    @else
                                        <h3 class="font-weight-light text-center">Seuls le client concerné et les administrateurs peuvent répondre à ce ticket.</h3><br/>
                                        <h3 class="font-weight-light text-center">Si il s'agit de votre ticket, veuillez vous <a href ="{{ url('/')}}">connecter</a></h3>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        @if($listeIntervention!=null)
                                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                            <thead>
                                                <tr class="text-left">
                                                    <th class="pr-0" style="width: 50px">#</th>
                                                    <th style="min-width: 200px">Date de création</th>
                                                    <th style="min-width: 150px">Nature</th>
                                                    <th style="min-width: 150px">Etat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($listeIntervention as $intervention)
                                                <tr>
                                                    <td class="pl-0">
                                                        <a href="{{ route('detailIntervention', ['id_intervention' =>$intervention->id]) }}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $intervention->id }}</a>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $intervention->date_creation_fiche }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $intervention->nature_intervention }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $intervention->etat_apres_intervention }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <h3 class="font-weight-light text-center">Aucune intervention</h3>
                                        @endif
                                        <div class="card-footer">
                                            <div class="row">
                                             <div class="col-lg-8"></div>
                                             <div class="col-lg-9">
                                                @foreach($detailTicket as $ticket)
                                                <form action="{{ route('creation-intervention', ['id_ticket' => $ticket->id])}}">
                                                @endforeach
                                                    <button type="submit" class="btn btn-primary btn-shadow font-weight-bold mr-2">Créer fiche d'intervention</button>
                                                </form>
                                             </div>
                                            </div>
                                           </div>
                                    </div>
                                    <!--end::Table-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>


@endsection
