<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class FController extends Controller
{
   public function liste()
    {
        $ticket = DB::table('ticket')->get();
        
        return view('FrontOffice/Flisteticket')->with('ticket', $ticket );
       
    }
    public function envoyerEmail(Request $request)
    {
        // Valider les données du formulaire (optionnel)
        $request->validate([
            'app' => 'required',
            'priorite' => 'required',
            'datedouverture' => 'required',
            'email' => 'required|email',
            
        ]);
        $app = $request->input('app');
        $priorite = $request->input('priorite');
        $datedouverture = $request->input('datedouverture');
        $email = $request->input('email');
        $capture = $request->input('capture');
        $capture = $request->file('capture');
        
        
        // Validate the inputs if needed
        
        // Store the image file in a designated directory (e.g., 'images')
        $captureName = $capture->getClientOriginalName();
        $capture->move(public_path('images'), $captureName);
        $datesible = null;
        if ($priorite === 'P1') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+2 hours'));
        } elseif ($priorite === 'P2') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+1 day'));
        } elseif ($priorite === 'P3') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+3 days'));
        }elseif ($priorite === 'P4') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+10 days'));
        }elseif ($priorite === 'P5') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+15 days'));
        }

        DB::table('ticket')->insert([
            'app' => $app,
            'priorite' => $priorite,
            'datedouverture' => $datedouverture,
            'datesible' => $datesible,
            'capture' => $captureName ,
            
        ]);
        // Créer le contenu de l'e-mail
        $contenuEmail = "App : $app\nPriorite : $priorite\nDate d'ouverture : $datedouverture\nDate Sible : $datesible";
         // Envoyer l'e-mail
        Mail::raw($contenuEmail, function ($message) use ($app, $email) {
            $message->to($email);
            $message->subject('Eroor de  ' . $app);
            $message->from($email);
        });

        return redirect('/Flisteticket')->with('ajouter' , 'Ticket a bien ajouté');
    }
    public function Fdelete($id){
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect('/Flisteticket')->with('message' , 'Ticket a bien supprime avec succes');
    }
    
    public function FshowUpdateForm($id)
    {
        $ticket = DB::table('ticket')->find($id);
        if (!$ticket) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        return view('FrontOffice/Fupdate')->with('ticket', $ticket);
    }

    public function updateTicket(Request $request, $id)
{
    // Valider les données du formulaire (optionnel)
    $request->validate([
        'app' => 'required',
        'priorite' => 'required',
        'datedouverture' => 'required',
        'email' => 'required|email',
    ]);

    $app = $request->input('app');
    $priorite = $request->input('priorite');
    $datedouverture = $request->input('datedouverture');
    $email = $request->input('email');
    $capture = $request->file('capture');

    // Validate the inputs if needed

    // Récupérer le ticket existant par son ID
    $ticket = DB::table('ticket')->find($id);

    if ($ticket) {
        // Si le ticket existe, mettez à jour ses champs
        $datesible = null;
        if ($priorite === 'P1') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+2 hours'));
        } elseif ($priorite === 'P2') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+1 day'));
        } elseif ($priorite === 'P3') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+3 days'));
        }elseif ($priorite === 'P4') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+10 days'));
        }elseif ($priorite === 'P5') {
            $datesible = date('Y-m-d H:i:s', strtotime($datedouverture . '+15 days'));
        }

        DB::table('ticket')->where('id', $id)->update([
            'app' => $app,
            'priorite' => $priorite,
            'datedouverture' => $datedouverture,
            'datesible' => $datesible,
            'capture' => $capture ? $capture->getClientOriginalName() : $ticket->capture,
        ]);

        // Créer le contenu de l'e-mail
        $contenuEmail = "App : $app\nPriorite : $priorite\nDate d'ouverture : $datedouverture\nDate Sible : $datesible";

        // Envoyer l'e-mail
        Mail::raw($contenuEmail, function ($message) use ($app, $email) {
            $message->to($email);
            $message->subject('Eroor de  ' . $app);
            $message->from($email);
        });

        return redirect('/Flisteticket')->with('modifier', 'Ticket a bien été mis à jour');
    } else {
        return redirect('/Flisteticket')->with('erreur', 'Le ticket spécifié n\'existe pas');
    }
}
    public function st()
    {
        $ouvert = DB::table('ticket')->where('statut', 'ouvert')->count();
        $enCharge = DB::table('ticket')->where('statut', 'en charge')->count();
        $resolu = DB::table('ticket')->where('statut', 'résolu')->count();
        $app = DB::table('application')->count();


        return view('FrontOffice/Fdashboard', compact('ouvert', 'enCharge', 'resolu' ,'app'));
    }
     public function search(Request $request)
    {
        $input = $request->input('app'); // Récupérer la valeur de recherche depuis le champ 'app'
        
        $ticket = Ticket::where('app', 'like', '%'.$input.'%')->get(); // Effectuer la recherche dans la base de données
        
        return view('FrontOffice/Flisteticket', ['ticket' => $ticket]); // Afficher les résultats de la recherche dans une vue
    }
   
}