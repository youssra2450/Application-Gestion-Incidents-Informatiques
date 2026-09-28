<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;





class UserController extends Controller
{
    public function liste()
    {
        $ticket = DB::table('ticket')->get();
        
        return view('BackOffice/Blisteticket')->with('ticket', $ticket );
       
    }
 public function Bsearch(Request $request)
    {
        $input = $request->input('app'); // Récupérer la valeur de recherche depuis le champ 'app'
        
        $ticket = Ticket::where('app', 'like', '%'.$input.'%')->get(); // Effectuer la recherche dans la base de données
        
        return view('BackOffice/Blisteticket', ['ticket' => $ticket]); // Afficher les résultats de la recherche dans une vue
    }
  public function updateStatut(Request $request, $id)
{
    $statut = $request->input('statut');

    if ($statut == 'résolu') {
        $datedecloture = Carbon::now()->addHour(); // Date et heure actuelles
    } else {
        $datedecloture = null; // Réinitialiser la date de clôture si le statut est différent de "résolu"
    }

    DB::table('ticket')->where('id', $id)->update([
        'statut' => $statut,
        'datedecloture' => $datedecloture,
    ]);

    // Ajoutez ici le code nécessaire après la modification du statut
    return redirect()->back()->with('message', 'Statut mis à jour avec succès');
}

    
    public function register(Request $request)
    {
        $matricule = $request->input('matricule');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirmation = $request->input('password_confirmation');
        $role = $request->input('role');
       
    
        if ($password !== $passwordConfirmation) {
            return redirect()->back()->withInput()->with('error', 'Le mot de passe et la confirmation du mot de passe ne correspondent pas.');
        }
    
        // Check if the email already exists in the users table
        $existingUser = DB::table('users')->where('email', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Ladresse e-mail existe déjà. Veuillez choisir une adresse e-mail différente..');
        }
         // Vérifier si le mot de passe respecte les exigences
    if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
        return redirect()->back()->withInput()->with('error', 'Le mot de passe doit comporter au moins 8 caractères et contenir des lettres et des symboles.');
    }
    
        DB::table('users')->insert([
            'matricule' => $matricule,
            'email' => $email,
            'password' => bcrypt($password),
             'role' => $role,
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

   
   public function login(Request $request)
{
    $matricule = $request->input('matricule');
    $password = $request->input('password');

    $user = DB::table('users')->where('matricule', $matricule)->first();

    if ($user && password_verify($password, $user->password)) {
        // Vérifiez le rôle de l'utilisateur
        if ($user->role == 'FO') {
            return redirect('Fdashboard');
        } elseif ($user->role == 'MO') {
            return redirect('Mdashboard');
        } elseif ($user->role == 'BO') {
            return redirect('Bdashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid role')->withInput();
        }
    } else {
        return redirect()->back()->with('error', 'Matricule ou mot de passe invalide.')->withInput();
    }
}

    
  
    public function logout(Request $request)
    {
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
    public function st()
    {
        $ouvert = DB::table('ticket')->where('statut', 'ouvert')->count();
        $enCharge = DB::table('ticket')->where('statut', 'en charge')->count();
        $resolu = DB::table('ticket')->where('statut', 'résolu')->count();
        $app = DB::table('application')->count();


        return view('BackOffice/Bdashboard', compact('ouvert', 'enCharge', 'resolu' ,'app'));
    }
 

   

}
