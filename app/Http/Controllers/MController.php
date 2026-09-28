<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MController extends Controller
{
     public function liste()
    {
        $ticket = DB::table('ticket')->get();
        
        return view('MiddleOffice/Mlisteticket')->with('ticket', $ticket );
       
    }
    public function listeapp()
    {
        $applications = DB::table('application')->get();
        
        return view('MiddleOffice/Mlisteapp')->with('application', $applications);
    }
    public function application(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'app' => 'required',
            'url' => 'required',
            'editeur' => 'required',
            'direction' => 'required',
            'sla' => 'required|file',
        ]);

        if ($validator->fails()) {
            return redirect('/listeapp')
                ->withErrors($validator)
                ->withInput();
        }

        $app = $request->input('app');
        $url = $request->input('url');
        $editeur = $request->input('editeur');
        $direction = $request->input('direction');
        $sla = $request->file('sla');
        $slaName = $sla->getClientOriginalName();
        $sla->move(public_path('images'), $slaName);

        DB::table('application')->insert([
            'app' => $app,
            'url' => $url,
            'editeur' => $editeur,
            'direction' => $direction,
            'sla' => $slaName,
        ]);

        return redirect('Mlisteapp')->with('ajouter', 'L\'application a été ajoutée avec succès.');
    }

    public function Mdeleteapp($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect('Mlisteapp')->with('ajouter', 'L\'application a été supprimée avec succès.');
    }

    public function MshowUpdateForm($id)
    {
        $application = DB::table('application')->find($id);
        if (!$application) {
            return redirect()->back()->with('error', 'Données introuvables.');
        }

        return view('MiddleOffice/Mupdate')->with('application', $application);
    }

    public function updateData(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'app' => 'required',
            'url' => 'required',
            'editeur' => 'required',
            'direction' => 'required',
            'sla' => 'file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $application = Application::find($id);
        if (!$application) {
            return redirect()->back()->with('error', 'Données introuvables.');
        }

        $application->app = $request->input('app');
        $application->url = $request->input('url');
        $application->editeur = $request->input('editeur');
        $application->direction = $request->input('direction');

        if ($request->hasFile('sla')) {
            $sla = $request->file('sla');
            $slaName = $sla->getClientOriginalName();
            $sla->move(public_path('images'), $slaName);
            $application->sla = $slaName;
        }

        $application->save();


        return redirect('Mlisteapp')->with('success', 'Données mises à jour avec succès.');
    }
    
    public function Asearch(Request $request)
    {
        $search = $request->input('search');
    
        $application = Application::where('app', 'LIKE', "%$search%")->get();
    
        return view('MiddleOffice/Mlisteapp', compact('application'));
    
    }
      public function st()
    {
        $ouvert = DB::table('ticket')->where('statut', 'ouvert')->count();
        $enCharge = DB::table('ticket')->where('statut', 'en charge')->count();
        $resolu = DB::table('ticket')->where('statut', 'résolu')->count();
        $app = DB::table('application')->count();


        return view('MiddleOffice/Mdashboard', compact('ouvert', 'enCharge', 'resolu' ,'app'));
    }
     public function MAsearch(Request $request)
    {
        $input = $request->input('app'); // Récupérer la valeur de recherche depuis le champ 'app'
        
        $application = Application::where('app', 'like', '%'.$input.'%')->get(); // Effectuer la recherche dans la base de données
        
        return view('MiddleOffice/Mlisteapp', ['application' => $application]); // Afficher les résultats de la recherche dans une vue
    }
     public function MTsearch(Request $request)
    {
        $input = $request->input('app'); // Récupérer la valeur de recherche depuis le champ 'app'
        
        $ticket = Ticket::where('app', 'like', '%'.$input.'%')->get(); // Effectuer la recherche dans la base de données
        
        return view('MiddleOffice/Mlisteticket', ['ticket' => $ticket]); // Afficher les résultats de la recherche dans une vue
    }


}
