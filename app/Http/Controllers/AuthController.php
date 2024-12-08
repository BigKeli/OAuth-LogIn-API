<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    /**
     * Redirect the user to the Keycloak authentication page.
     */
public function redirectToProvider()
{
    $authUrl = env('KEYCLOAK_HOSTNAME') . '/realms/' . env('KEYCLOAK_REALM') . '/protocol/openid-connect/auth';
   
    // Manually set the authorization URL
    return Socialite::driver('keycloak')->with(['auth_server_url' => $authUrl])->redirect();
}



    /**
     * Obtain the user information from Keycloak and store it in the session.
     */
    public function handleProviderCallback()
    {
        // Get the user information from Keycloak
        $keycloakUser = Socialite::driver('keycloak')->user();

        // Create a new User instance
        $user = new User(
            $keycloakUser->name,
            $keycloakUser->email,
            $keycloakUser->token
        );

        // Store user data in the session
        Session::put('user', $user->toArray());

        return redirect('/');
    }

    /**
     * Log the user out of the application and Keycloak.
     */
    public function logout()
{
    // Log the user out from Laravel
    Auth::logout();

    // Clear the session
    Session::flush();

    // Define Keycloak logout URL
    $keycloakLogoutUrl = config('services.keycloak.base_url') 
        . '/realms/' . config('services.keycloak.realms') 
        . '/protocol/openid-connect/logout';

    // Define the URL to redirect to after Keycloak logout
    $redirectAfterLogout = config('app.url'); // Redirect back to the home page or login page

    // Build the complete logout URL
    $logoutUrl = $keycloakLogoutUrl . '?' . http_build_query([
        'post_logout_redirect_uri' => $redirectAfterLogout,
        'client_id' => config('services.keycloak.client_id'),
    ]);

    // Redirect to Keycloak logout URL
    return redirect($logoutUrl);
}
}
