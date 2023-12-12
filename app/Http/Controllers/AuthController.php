<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        return response()->json($request);
        /*$credentials = $request->only('username', 'password');
        $username = User::where('username', $request->username)->first();
        if (!$username) return response()->json(["error" => "El nombre de usuario no existe"], 400);
        $user = User::with('rol')->where('username', $request->username)->where('estado_registro', 'A')->first();
        //return response()->json([$user  ]);

        if (!$user) return response()->json(['error' => 'Usuario bloqueado'], 402);

        try {
            $this->cambiarDuracionToken();
            if (!$token = FacadesJWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 403);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        if ($user->tipo_usuario == 1) {
            return response()->json(["error" => "Tipo de usuario incorrecto"], 403);
        } else {            

            $response = array(
                "id" => $user->id,
                "rol_id" => $user->rol_id,
                "username" => $user->username,
                "rol" => $user->rol,
            );
            $response['token'] = $token;
            return response()->json($response);
        }*/
    }

    public function authenticate_particular(Request $request)
    {
        //return response()->json($request);
        $credentials = $request->only('username', 'password');
        $username = User::where('username', $request->username)->first();
        if (!$username) return response()->json(["error" => "El nombre de usuario no existe"], 400);
        $user = User::with('rol')->where('username', $request->username)->where('estado_registro', 'A')->first();
        //return response()->json([$user  ]);

        if (!$user) return response()->json(['error' => 'Usuario bloqueado'], 402);

        try {
            $this->cambiarDuracionToken();
            if (!$token = FacadesJWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 403);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = FacadesJWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e);
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e);
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e);
        }
        return response()->json(compact('user'));
    }

    private function cambiarDuracionToken()
    {
        $myTTL = 60 * 24 * 1; // En minutos
        FacadesJWTAuth::factory()->setTTL($myTTL);
    }
    public function my()
    {
        $my = User::with('rol')->find(auth()->user()->id);
        $response = array(
            "id" => $my -> id,
            "rol_id" => $my ->rol_id,
            "username" => $my -> username,
            "rol" => $my -> rol
        );
        return response()->json(["data" => $response]);
    }

    /**
     *
     */
    public function updatePassword(Request $request)
    {
        // Obtener usuario autenticado (logeado)
        $usuario = User::find(auth()->user()->id);
        // contraseña actual (insertar)
        $current_password = $request->current_password;
        //Nueva contraseña (insertar)
        $new_password = $request->new_password;
        // Confirmar la nueva contraseña
        $confirm_Password = $request->confirm_Password;

        if (Hash::check($current_password, $usuario->password)) {
            if ($new_password == $confirm_Password) {
                $usuario->password = $new_password;
                $usuario->save();

                return response()->json(['resp' => 'La contraseña ha sido actualizada exitosamente'], 200);
            } else {
                return response()->json(['resp' => 'Las contraseñas no COINCIDEN, vuelva a insertar'], 400);
            }
        } else {
            return response()->json(['resp' => 'La contraseña actual no es correcta, inserte nuevamente.'], 401);
        }
    }      

}