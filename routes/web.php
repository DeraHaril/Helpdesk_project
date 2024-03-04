<?php

use App\Http\Controllers\manuelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('connexion');
})->name('connexion');



Route::get('accueil', 'CompteController@accueil')->name('viewAccueil');

Route::get('inscription', 'UtilisateurController@pageInscription')->name('inscription');

Route::post('/traitement', 'UtilisateurController@traitementConnexion');

Route::post('traitementInscription', 'UtilisateurController@traitementInscription');

Route::get('/deconnexion', 'CompteController@deconnexion');

Route::get('/page', 'CompteController@deconnexion');

Route::get('/pagesup', 'UtilisateurController@pageA');

Route::post('insertionTicket','gestionTicketController@traitementInsertionTicket');

Route::get('ticket', 'gestionTicketController@listeTicket');

Route::get('detailticket/{id_ticket}/{nom_client}', 'gestionTicketController@detailTicket')->name('detailticket');

Route::get('intervention-{id_intervention}', 'gestionInterventionController@detailIntervention')->name('detailIntervention');

Route::get('création-de-ticket', 'gestionTicketController@pageCreationTicket')->middleware('checkUser');

Route::get('dashboard', 'dashboardController@pageDashboard');

Route::get('creation-intervention/{id_ticket}', 'gestionInterventionController@pageCréationIntervention')->name('creation-intervention')->middleware('Administrateur');

Route::post('insertionIntervention/{id_ticket}', 'gestionInterventionController@insertionIntervention')->name('insert-intervention');

Route::get('creation-note/{id_ticket}/{nom_repondeur}', 'gestionTicketController@creerNote')->name('creation-note');

Route::get('ticket-personne', 'gestionTicketController@listeticketsClient')->middleware('checkUser');

Route::post('maj-ticket/{idTicket}', 'gestionTicketController@updateEtatTicket')->name('maj-ticket');

Route::get('suppression-ticket/{id_ticket}', 'gestionTicketController@deleteTicket')->name('suppression-ticket');

Route::get('profil', 'UtilisateurController@pageProfil')->middleware('checkUser');

Route::get('profil/editer-compte', 'UtilisateurController@pageReglageProfil')->middleware('checkUser');

Route::post('profil/mise-a-jour', 'UtilisateurController@majCompte');

Route::post('profil/mise-a-jour/mdp', 'UtilisateurController@majMdp');

Route::get('Verification_Email_resend','UtilisateurController@envoiEmailVerification');

Route::get('Verification-email', 'UtilisateurController@pageEmailVerificationNotification');

Route::get('retour-inscription', 'UtilisateurController@retourInscription');

Route::get('connect', 'UtilisateurController@ajouter_email_verified_at');

Route::get('manuel', 'manuelController@pageManuel');

Route::get('Categorie-materiel', 'manuelController@pageListeCatégorieMatériel');

Route::get('Appareils', 'manuelController@pageListeManuelDispo');

Route::get('verificationSMS', 'UtilisateurController@envoiSMSVerification');

Route::get('SMS-verification', 'UtilisateurController@pageVerificationSMS');

Route::post('traitement-verification-SMS','UtilisateurController@tritementVerificationSMS');

Route::post('ticket/mise-a-jour/{idTicket}/{nom_client}', 'gestionTicketController@update_ticket_client')->name('mise-a-jour-reference-conf');

Route::get('ticket/suppression-reference/{idTicket}/{nom_client}', 'gestionTicketController@supprimerReferenceTicket')->name('suppression-reference-conf');

Route::get('telechargement/ficheIntervention/{id_intervention}','gestionInterventionController@genererPDF')->name('downloadPDFFicheIntervention');

Route::get('renvoiSMS', 'UtilisateurController@renvoiSMS');
