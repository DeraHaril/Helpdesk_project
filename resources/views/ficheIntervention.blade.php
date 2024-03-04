<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .demo div {
                float: left;
                clear: none;
            }
        </style>
    </head>
    <body>
        @foreach($detailIntervention as $intervention)
        <div>
            <!--begin::Invoice-->
            <div>
                <div>
                    <!-- begin: Invoice header-->
                    <div>
                        <h1>Fiche d'intervention</h1>
                        <div style = "float: right;">
                            <span>
                                <span>Ticket: {{ $intervention->id_ticket }}</span><br/>
                                <span>{{ $intervention->date_creation_fiche}}</span>
                            </span>
                        </div>
                    </div>
                    <!--end: Invoice header-->
                    <!--begin: Invoice body-->
                    <div>
                        <div>
                            <div style="height: 70px">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Début d'intervention</th>
                                            <th></th>
                                            <th></th>
                                            <th>Fin d'intervention</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $intervention->date_debut_intervention }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $intervention->date_fin_intervention }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style ="height:100px">INTERVENANT(S):
                                <div>
                                    @for($i=0; $i<count($listeIntervenants); $i++)
                                    -{{ $listeIntervenants[$i] }}<br />
                                    @endfor
                                </div>
                            </div>
                            <div style ="height:30px; ">NATURE DE L'INTERVENTION:
                                <div>
                                    {{ $intervention->nature_intervention }}
                                </div>
                            </div>
                            <div style ="height:50px"></div>
                            <div style="height:20px">OBSERVATION</div>
                            <div>
                               {{$intervention->observation}}
                            </div>
                        </div>
                        <div>
                            <!--end::Invoice To-->
                            <!--begin::Invoice No-->
                            <div style ="margin-top: 50px">ETAT APRES INTERVENTION</div>
                            <div ><b>{{ $intervention->etat_apres_intervention }}</b></div>
                            <!--end::Invoice No-->
                        </div>
                    </div>
                    <div style = "height:50px">
                    </div>
                    @foreach ($responsable_ticket as $responsable)
                    <div class = "demo">
                        <div style="width:300px;text-align:center">
                            <span>
                                <p><u>auteur du ticket</u></p> <br/>
                                <p><strong>{{ $responsable->nom_client }}</strong></p>
                            </span>
                        </div>
                        <div style = "width:300px;float: right;text-align:center">
                            <span>
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
    </body>
</html>
