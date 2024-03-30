<?php 

namespace App\Controllers;

use App\Controller;
use App\Request;
use App\Models\UserModel;

class Crud extends Controller
{
    public static function index()
    {
        $all_users = (new UserModel())->all();

        return view('crud/index', ['users' => $all_users]);
    }

    public static function store(Request $request)
    {
        $user = new UserModel();

        $data = [
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ];

        $new_user = $user->create($data);

        if ( $new_user ) {
            session()->set('success', 'User created successfully');
            return redirect('/add-user');
        }

        session()->set('error', 'Error: Unable to create user');
        return redirect('/add-user');
    }

    public static function show(Request $request)
    {

        if ( ! $request->has('id') ) {
            session()->set('error', 'Error: User not found');
            return redirect('/add-user');
        }

        $user_id = (int) $request->get('id');

        $user = new UserModel();

        $user = $user->find($user_id);
        $user['password'] = '';

        return view('crud/edit', ['user' => $user]);
    }

    public static function update(Request $request)
    {
        if ( ! $request->has('id') ) {
            session()->set('error', 'Error: User not found');
            return redirect('/add-user');
        }

        $user_id = (int) $request->get('id');

        $user = new UserModel();

        $data = [
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ];

        $updated_user = $user->update($user_id, $data);

        if ( $updated_user ) {
            session()->set('success', 'User updated successfully');
            return redirect('/add-user');
        }

        session()->set('error', 'Error: Unable to update user');
        return redirect('/add-user');
    }

    public static function destroy(Request $request)
    {
        if ( ! $request->has('id') ) {
            session()->set('error', 'Error: User not found');
            return redirect('/add-user');
        }
        
        $user_id = (int) $request->get('id');
        $model = new UserModel();

        $deleted_user = $model->delete($user_id);

        if ( $deleted_user ) {
            session()->set('success', 'User deleted successfully');
            return redirect('/add-user');
        }
        
        session()->set('error', 'Error: Unable to delete user');
        return redirect('/add-user');
    }
}