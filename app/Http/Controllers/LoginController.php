<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private $paginate = 15;
    private $exception = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }

    public function index()
    {
        try {
            return view('auth.index');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao carregar a pagina.');
        }
    }
    public function authenticate(Request $request)
    {
        $result = array();
        try {
            $email = $request->input('username');
            $password = $request->input('password');

            // realiza login na base - tabela users
            $user = Users::where('username', $email)->first();


            if ($user->active == 1) {
                if (Hash::check($password, $user->password)) {
                    session()->put('user', [
                        'id' => $user->id,
                        'account_type' => $user->account_type_id,
                        'is_admin' => $user->is_admin,
                        'email' => $user->email
                    ]);
                    return redirect()->route('dashboard');
                }
            }





            // realiza o login local - Administrador
            // if ($email == 'admin') {
            //     $password_day = (date('md'));
            //     if ($password == $password_day) {
            //         session()->put('user', [
            //             'id' => null,
            //             'name' => 'Administrador',
            //             'is_admin' => 'administrador',
            //             'email' => null
            //         ]);
            //         return redirect()->route('dashboard');
            //     }
            // }

            // se cair aqui o login nao foi realizado com sucesso
            throw new \Exception("O usu??rio/e-mail ou a senha est?? incorreto!");
        } catch (\Exception $e) {
            return back()->with('error', 'O usu??rio/e-mail ou a senha est?? incorreto!');
        }
    }

    public function logout()
    {
        //
        if (session()->has('user')) {
            session()->pull('user');
        }
        return redirect()->route('login');
    }
}
