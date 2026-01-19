<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Show form to create new admin account
     */
    public function createAdmin()
    {
        return view('admin.akun.create-admin');
    }
    
    /**
     * Store new admin account
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        $user->assignRole('admin');
        
        return redirect()->route('admin.akun')
            ->with('success', 'Akun admin berhasil ditambahkan!')
            ->with('new_admin', [
                'name' => $request->name,
                'email' => $request->email,
            ]);
    }
    
    /**
     * Delete user account
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting own account
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun sendiri!');
        }
        
        $user->delete();
        
        return redirect()->route('admin.akun')->with('success', 'Akun berhasil dihapus!');
    }
}
