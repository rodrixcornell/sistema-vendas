<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\StoreUserPost;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(StoreUserPost $request)
    {
        // dd($request);
        // User::Create($request->all());
        $user = UserService::store($request->all());

        if (!$user) return redirect()->route('users.index')->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('users.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.forms', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserPost $request, User $user)
    {
        // dd($request);
        // User::Create($request->all());
        $user = UserService::update($request->all(), $user);

        if (!$user) return redirect()->route('users.edit', $user)->withErro('Ocorreu um erro ao salvar');
        return redirect()->route('users.index')->withSucesso('Salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd($user);
        $user = UserService::destroy($user);

        if (!$user) return redirect()->route('users.edit', $user)->withErro('Ocorreu um erro ao excluir');
        return redirect()->route('users.index')->withSucesso('Excluido com sucesso');
    }
}
