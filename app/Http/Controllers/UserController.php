<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function show(User $user)
  {
    return view('admin.users.profile', ['user' => $user]);
  }

  public function index()
  {
    $users = User::all();
    return view('admin.users.index', ['users' => $users]);
  }

  public function update(User $user, Request $request)
  {
    $validatedInputs = $request->validate([
      'username' => ['required', 'string', 'max:255', 'alpha_dash',],
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'avatar' => ['file']
    ]);
    if ($request->avatar) {
      $validatedInputs['avatar'] = $request->avatar->store('images', 'public');
    }
    $user->update($validatedInputs);
    return redirect()->back();
  }

  public function destroy(User $user)
  {
    try {
      $user->delete();
      return redirect()->route('users.index')->with('delete-user-message', 'User deleted successfully!');
    } catch (\Exception $e) {
      return redirect()->route('users.index')->with('delete-user-error', 'Unable to delete user!');
    }
  }
}
