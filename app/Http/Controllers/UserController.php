<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return User::getAllUsers();
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            DB::commit();
            return response()->json([
                'message' => 'Usuário criado com sucesso.',
                'data' => $user['id'],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao criar usuário: ', 'details:' => $e->getMessage()], 500);
        }
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
}
