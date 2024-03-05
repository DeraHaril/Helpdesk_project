<?php

namespace App\Http\Controllers;
require 'src/PHPMailer.php';
require 'src/SMTP.php';


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Auth\Events\Registered;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use \Osms\Osms;

class UtilisateurController extends Controller
{
    /*public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }*/

    public function pageInscription(){
        return view('inscription');
    }

    public function traitementConnexion(Request $request){
        $client = new Models\Client;
        $intervenant = new Models\Intervenant;

        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $email = request('email');

        //$listeClient = $client::where('email', $email)->get();
        //$listeClient2 = DB::table('client')->where('email', $email);
        $listeClient3 = DB::select("SELECT * from client where email = '$email'");
        $listeIntervenant = DB::select("SELECT * from intervenant where email = '$email'");


        //dump($listeClient3);
        if($listeClient3){
            foreach($listeClient3 as $client){
                $id = $client->id;
                $nom_user = $client->nom_client;
                $numero_telephone = $client->numero_telephone;
                $email_user = $client->email;
                $profession = $client->profession;
                $email_verified_at = $client->email_verified_at;
                $created_at = $client->created_at;
            }
            if(password_verify(request('password'), $client->password)){
                $request->session()->put('id', $id);
                $request->session()->put('nom',$nom_user);
                $request->session()->put('numero_telephone', $numero_telephone);
                $request->session()->put('email',$email_user);
                $request->session()->put('profession',$profession);
                $request->session()->put('role','client');
                $request->session()->put('date_inscription',$created_at);
                $arrayNom = str_split(session('nom'));
                $symbole_user = $arrayNom[0];
                $request->session()->put('symbole',$symbole_user);
                //dump($request->session()->all());
                if(isset($email_verified_at)){
                    return redirect('accueil');
                }
                else{
                    return $this->envoiEmailVerification();
                }

            }
            else{
                return back()->withInput()->withErrors([
                    'password' => 'Mot de passe incorrect',
                ]);
            }
        }
        if($listeIntervenant){
            foreach($listeIntervenant as $intervenant){
                $id = $intervenant->id_intervenant;
                $nom_user = $intervenant->nom_intervenant;
                $numero_telephone = $intervenant->numero_telephone;
                $email_user = $intervenant->email;
                $profession = $intervenant->poste;
            }
            if(password_verify(request('password'), $intervenant->password)){
                $request->session()->put('id', $id);
                $request->session()->put('nom',$nom_user);
                $request->session()->put('numero_telephone', $numero_telephone);
                $request->session()->put('email',$email_user);
                $request->session()->put('profession',$profession);
                $request->session()->put('role','intervenant');
                $arrayNom = str_split(session('nom'));
                $symbole_user = $arrayNom[0];
                $request->session()->put('symbole',$symbole_user);
                //dump($request->session()->all());
                return redirect('accueil');
            }
            else{
                return back()->withInput()->withErrors([
                    'password' => 'Mot de passe incorrect',
                ]);
            }
        }
        return back()->withInput()->withErrors([
            'email' => 'Vérifiez votre email',
        ]);

        /*$resultat = Auth::attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        $listeIntervenant = $intervenant::where('email', $email1)->get();


        dump($resultat);
        //if($resultat){
            //dump($request->session()->all());
            //return redirect('accueil');
        //}

        //return back()->withInput()->withErrors([
            /*'email' => 'Vérifiez votre email ou mot de passe.',
        ]);*/

    }

    public function majCompte(Request $request){
        request()->validate([
            'email'=> ['required', 'email'],
            'profession' => ['required'],
            'numero_telephone' => ['required'],
            'nom' => ['required']
        ]);
        //vaovao
        $nom_vaovao = request('nom');
        $profession_vaovao = request('profession');
        $numero_telephone_vaovao = request('numero_telephone');
        $email_vaovao = request('email');
        $id_personne = session('id');
        $requete = DB::update("UPDATE client set nom_client = '$nom_vaovao', profession = '$profession_vaovao',numero_telephone = '$numero_telephone_vaovao', email = '$email_vaovao'
            where id = '$id_personne'");

        $request->session()->put('nom', $nom_vaovao);
        $request->session()->put('profession', $profession_vaovao);
        $request->session()->put('numero_telephone', $numero_telephone_vaovao);
        $request->session()->put('email', $email_vaovao);

        return redirect('profil');
    }

    public function majMdp(){
        request()->validate([
            'mdp_precedent' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);
        $id_personne = session('id');
        $sql_mdp_client = DB::select("SELECT password from client where id = '$id_personne'");
        //$mdp_client = $sql_mdp_client[0]->password;
        $sql_mdp_intervenant = DB::select("SELECT password from intervenant where id_intervenant = '$id_personne'");
        if($sql_mdp_client!=null){
            $mdp_client = $sql_mdp_client[0]->password;
            if(password_verify($mdp_client,request('mdp_precedent'))){
                $nouveau_mdp = password_hash( request('password'), PASSWORD_DEFAULT);
                DB::update("UPDATE client set password = '$nouveau_mdp' where id = '$id_personne'");
                return redirect('profil');
            }
            else{
                return back()->withInput()->withErrors([
                    'mdp_precedent' => 'mot de passe incorrect',
                ]);
            }
        }
        if($sql_mdp_intervenant!=null){
            $mdp_intervenant = $sql_mdp_intervenant[0]->password;
            if(password_verify($mdp_intervenant,request('mdp_precedent'))){
                $nouveau_mdp = password_hash( request('password'), PASSWORD_DEFAULT);
                DB::update("UPDATE intervenant set password = '$nouveau_mdp' where id_intervenant = '$id_personne'");
                return redirect('profil');
            }
            return back()->withInput()->withErrors([
                'mdp_precedent' => 'mot de passe incorrect',
            ]);
        }
        return back()->withInput()->withErrors([
            'mdp_precedent' => 'mot de passe incorrect',
        ]);
    }

    public function pageA(Request $request){
        //dump($request->session()->all());
        $titre = 'Accueil';
        return view('accueil',
            ['titre' => $titre]
        );
    }

    public function pageProfil(){
        $id_personne = session('id');
        $nom_client = session('nom');

        $nb_ticket_total = DB::select("SELECT count(id) from ticket where id_client = '$id_personne'");
        $nb_ticket_ouvert = DB::select("SELECT count(etat) from ticket where etat = 'ouvert' and id_client = '$id_personne'");
        $nb_ticket_fermé = DB::select("SELECT count(etat) from ticket where etat = 'fermé' and id_client = '$id_personne'");
        $nb_ticket_en_cours = DB::select("SELECT count(etat) from ticket where etat = 'en cours' and id_client = '$id_personne'");
        $nb_ticket_non_résolu = DB::select("SELECT count(etat) from ticket where etat = 'non résolu' and id_client = '$id_personne'");

        foreach($nb_ticket_total as $total){
            $nb_total = $total->count;
        }
        foreach($nb_ticket_ouvert as $ouvert){
            $nb_ouvert = $ouvert->count;
        }
        foreach($nb_ticket_fermé as $fermé){
            $nb_fermé = $fermé->count;
        }
        foreach($nb_ticket_en_cours as $en_cours){
            $nb_en_cours = $en_cours->count;
        }
        foreach($nb_ticket_non_résolu as $non_résolu){
            $nb_non_résolu = $non_résolu->count;
        }

        $data_nb = array(
            "nb_ouvert" => $nb_ouvert,
            "nb_fermé" => $nb_fermé,
            "nb_en_cours" => $nb_en_cours,
            "nb_non_résolu" => $nb_non_résolu,
            "nb_total" => $nb_total,
        );

        $client = DB::select("SELECT * from client where id = '$id_personne'");
        $intervenant = DB::select("SELECT * from intervenant where id_intervenant = '$id_personne'");
        $nbClient = count($client);
        $nbIntervenant = count($intervenant);
        if($nbClient == 1){
            $listeticket = DB::select("SELECT ticket.id, NOM_CLIENT, CATEGORIE, CONFIDENTIALITE, ETAT, IMPORTANCE, DATE_AJOUT, SUJET
                from TICKET, CLIENT where CLIENT.ID = TICKET.ID_CLIENT and nom_client = '$nom_client' order by date_ajout desc");
            $titre = "Mes tickets";
        }
        elseif($nbIntervenant == 1){
            return view('accès_interdit_admin');
        }
        return view('profil',[
            'listeTicket'=>$listeticket,
            'titre'  => $titre,
            'data_dashboard_nombre' => $data_nb
        ]);
    }

    public function pageReglageProfil(){
        $titre = "réglage du profil";
        return view('reglageprofil',
            [ 'titre'  => $titre]
        );
    }

    public function traitementInscription(Request $request){
        request()->validate([
            'nomclient' => ['required'],
            'email'=> ['required', 'email', 'unique:client,email'],
            'numerotelephone' => ['required', 'numeric'],
            'profession'=> ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        $config = ['table'=>'client','length'=>10,'prefix'=>'CL-'];
        $id = IdGenerator::generate($config);

        $client =  Models\Client::create([
            'id' => $id,
            'nom_client' => request('nomclient'),
            'numero_telephone' => request('numerotelephone'),
            'email' => request('email'),
            'password' => password_hash( request('password'), PASSWORD_DEFAULT),
            'profession' => request('profession'),
        ]);
        //$request->session()->put('id', $id);
        //$request->session()->put('nom',request('nomclient'));
        $request->session()->put('numero_telephone', request('numerotelephone'));
        $request->session()->put('email',request('email'));
        //$request->session()->put('profession',request('profession'));
        //$request->session()->put('role','client');
        //$request->session()->put('mdp',password_hash( request('password'), PASSWORD_DEFAULT));
        //$arrayNom = str_split(session('nom'));
        //$symbole_user = $arrayNom[0];
        //$request->session()->put('symbole',$symbole_user);

        return $this->envoiEmailVerification();
    }

    public function pageEmailVerificationNotification(){
        return view('VerificationEmailNotification');
    }

    public function envoiEmailVerification(){

        $mail = new PHPMailer(true);
        $email_message = file_get_contents('assets/email_message.html');

        try {
            //Server settings
            $mail->setLanguage('fr', '/optional/path/to/language/directory/');
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = env("MAIL_HOST");                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = env("MAIL_USERNAME");                     //SMTP username
            $mail->Password   = env("MAIL_PASSWORD");                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = env("MAIL_PORT");

            //Recipients
            $mail->setFrom(env("MAIL_USERNAME"), env("MAIL_FROM_NAME"));
            $mail->addAddress(session('email'));     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confirmation de votre email';
            $contents = array( '&lt;' , '&gt;' , '&quot;');
            $crochets = array( '<', '>' , '"');

            $mail->Body    = str_replace($contents, $crochets, $email_message);
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            //dd($mail);
            $mail->send();
            return redirect('Verification-email');
        }
        catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function retourInscription(Request $request){
        $email = session('email');
        $requete = DB::delete("DELETE from client where email = '$email'");
        $request->session()->forget(['numero_telephone', 'email']);

        return redirect('inscription');
    }

    public function ajouter_email_verified_at(Request $request){
        $email = session('email');
        date_default_timezone_set('Indian/Antananarivo');
        $date_email_verification = date('d/m/Y h:i:s');
        $requete = DB::update("UPDATE client set email_verified_at = '$date_email_verification' where email = '$email'");

        if($request->session()->has('id')){
            return redirect('accueil');
        }
    }

    public function pageVerificationSMS(){
        return view('verificationSMS');
    }

    public function envoiSMSVerification(Request $request){
        if($request->session()->has('email')){
            $email = session('email');
            $numero = session('numero_telephone');
            $detail_client = DB::select("SELECT * from client where email = '$email'");
            foreach($detail_client as $client){
                $email_verified_at = $client->email_verified_at;
                $numero_telephone_verified_at = $client->numero_telephone_verified_at;
            }
            if(isset($numero_telephone_verified_at)){
                return redirect('accueil');
            }
            if(!isset($email_verified_at)){
                $ajout_email_date = $this->ajouter_email_verified_at($request);
            }

            $config = array(
                'clientId' => $_ENV['OSMS_CLIENT_ID'],
                'clientSecret' => $_ENV['OSMS_CLIENT_SECRET']
            );

            $osms = new Osms($config);
            $osms->setVerifyPeerSSL(false);
            // retrieve an access token
            $response = $osms->getTokenFromConsumerKey();

            if($request->session()->has('code')){
                $request->session()->forget('code');

            }
            if (!empty($response['access_token'])) {
                $num_session =  session('numero_telephone');
                $num_session_modifié = substr($num_session, 1);
                $numero_receveur = 'tel:+261'.$num_session_modifié;
                $senderAddress = 'tel:+261324505562';
                $receiverAddress = $numero_receveur;
                $chiffre = rand(100000,999999);
                $message = "Votre code secret est: $chiffre";
                $senderName = 'HelpDesk';

                $osms->sendSMS($senderAddress, $receiverAddress, $message, $senderName);

                $request->session()->put('code', $chiffre);
                return redirect('SMS-verification');
            } else {
                return 'error';
            }
        }
        else{
            $message = "Votre session a expiré, veuillez vous connecter à nouveau";
            return view('connexion',
                ['message' => $message]
            );
        }
    }

    public function tritementVerificationSMS(Request $request){
        request()->validate([
            'code' => ['required'],
        ]);
        $email = session('email');
        if(request('code')==session('code')){
            date_default_timezone_set('Indian/Antananarivo');
            $date_numero_verification = date('d/m/Y h:i:s');
            DB::update("UPDATE client set numero_telephone_verified_at = '$date_numero_verification' where email = '$email'");
            $request->session()->forget('code');
            $request->session()->forget('email');
            $request->session()->forget('numero_telephone');
            $message = "Vous pouvez maintenant vous connecter avec votre nouveau compte";
            return view('connexion', [
                'message' => $message,
            ]);
        }
        else{
            return back()->withInput()->withErrors([
                'code' => 'chiffre saisi incorrect',
            ]);
        }
    }
    public function renvoiSMS(Request $request){
        $request->session()->forget('code');
        return $this->envoiSMSVerification($request);
    }

}
