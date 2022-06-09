<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Queries\QueryBuilderUsers;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(QueryBuilderUsers $users)
    {
        return view("News.admin.profile-index", ['users' => $users->getUsers()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $profile
     * @return Application|Factory|View|Response
     */
    public function edit(User $profile)
    {
        return view('News.admin.profile-edit',['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UpdateUserRequest $userRequest
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function update(Request $request, UpdateUserRequest $userRequest, int $id)
    {
        $user = User::find($id);
        $errors = [];
        if ($request->isMethod('put')) {
            $validated = $userRequest->validated();
            if (Hash::check($validated['password'], $user->password)) {
                $validated['password'] = Hash::make($validated['password']);
                $user->fill($validated);
                if ($validated['new_password']) {
                    $newPass = Hash::make($validated['new_password']);
                    $user->fill([
                        'password' => $newPass
                    ]);
                }
                $user->save();
                $request->session()->flash('MSG', "Данные сохранены");
            } else
                $errors['password'][] = 'Неверный текущий пароль';

            return redirect()->route('admin.profile.edit', ['profile' => $id])->withErrors($errors);
        }

        return view('News.admin.profile-edit', ['profile' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $user = User::find($id);
        try {
            $user->delete();
            return response()->json('ok');

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => true], 400);
        }

    }
}
