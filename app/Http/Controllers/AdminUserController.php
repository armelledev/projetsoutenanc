<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password; 
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $search = $request->input('search');
       
      $users = User::when($search, function ($query, $search){ 

      return $query->where('name','like', "%{$search}%")
                          ->orWhere('email','like' ,"%{$search}%");
      })

        ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a user.
     */
    public function create()
    {
        //
        return view('admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    $request->validate([
    'name'     => ['required', 'string', 'max:255'],
    'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'], 
    'password' => ['required', 'confirmed', Password::defaults()],
    'role'     => ['required', 'in:employer,admin,super_admin'],
]);
        User::create([
         
        'name' => $request->name,
        'email' =>$request->email,
        'password' =>Hash::make($request->password),

        'role' =>$request->role,
        ]);
        
        return redirect()->route('admin.users.index')
                         ->with('success', 'Employé créé avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.Users.edit', compact('user'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
      
        
      $request->validate([
    'name'     => ['required', 'string', 'max:255'],
    'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id], 
    'password' => ['nullable', 'confirmed', Password::defaults()], 
    'role'     => ['required', 'in:employer,admin,super_admin'],
       ]);
      $date=[
        'name'=> $request->name,
         'email'=> $request->email,
          'role'=> $request->role,

    ];
       if($request->filled(('password'))){
        $date['password'] = Hash::make($request->password);
       }

       $user->update($date);

       return redirect()->route('admin.users.index')

                      ->with('success','employer mise a jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        
       $user->delete();
       return redirect()->route('admin.users.index')

                      ->with('success','utilisateur supprimer avec success');
}
}