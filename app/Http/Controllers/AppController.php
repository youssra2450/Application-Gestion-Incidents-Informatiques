<?php
namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
   
    public function liste()
    {
        $applications = DB::table('application')->get();
        
        return view('listeapp')->with('application', $applications);
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

        return redirect('/listeapp')->with('ajouter', 'L\'application a été ajoutée avec succès.');
    }

    public function deleteapp($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect('/listeapp')->with('', 'L\'application a été supprimée avec succès.');
    }

    public function showUpdateForm($id)
    {
        $application = DB::table('application')->find($id);
        if (!$application) {
            return redirect()->back()->with('error', 'Données introuvables.');
        }

        return view('updateapp')->with('application', $application);
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


        return redirect('/listeapp')->with('success', 'Données mises à jour avec succès.');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $application = Application::where('app', 'LIKE', "%$search%")->get();
    
        return view('listeapp', compact('application'));
    
    }
}