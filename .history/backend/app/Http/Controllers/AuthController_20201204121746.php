<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    //protected $maxAttempts = 2; //  Default is 5
    //protected $decayMinutes = 1; // Default is 1
    
    /**
     *Create a new AuthController instance 
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $custom_message = ['regex'=> 'Votre mot de passe doit etre constitue d\'au moins 8 caracteres et contenir au moins: 1 majuscule, 1 minuscule, 1 caractere special, 1 chiffre'];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'regex: /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',
                ]
        ],$custom_message);
       
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => [
        //         'required',
        //         'string',
        //         'min:6'
        //         ]
        // ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if(!$token = auth()->attempt($validator->validated())) {
            $res = DB::table('users')->where('email', '=', $request->email)->get();
            $nb_login_attempts = 3;
            $client_ip = $request -> ip();
            $message = 'Accès non autorisé';
            if($res[0]->nb_login_attempts < 3){
                $nb_login_attempts = $res[0]->nb_login_attempts+1;
            }else {
                //ecrire dans un fichier log
                Log::info('Mr./Mme '.$res[0]->name.' titulaire de l\'email : '.$request->email.' a tenté de se connécté 3 fois avec un movais couple d\'identifiant/mots de passe');
                $nb_login_attempts = 0;
                $message = $res[0]->name.' Vous avez atteint le nombre maximal de tentative, veuillez réssayer dans 1 minutes';
            }
            
            $affected = DB::table('users')
              ->where('email', $request->email)
              ->update(['nb_login_attempts' => $nb_login_attempts]);

            // return response()->json(['error' => 'Unauthorized'], 401);
            return response()->json($res[0], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register a User
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $custom_message = ['regex'=> 'Votre mot de passe doit etre constitue d\'au moins 8 caracteres et contenir au moins: 1 majuscule, 1 minuscule, 1 caractere special, 1 chiffre'];
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => [
                'required',
                'string',
                'confirmed',
                'regex: /(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',
                ]
        ],$custom_message);

        if($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password),'nb_login_attempts'=> 0,'ip_client' => '']
        ));

        return response()->json([
            'message' => 'User successfuly registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
