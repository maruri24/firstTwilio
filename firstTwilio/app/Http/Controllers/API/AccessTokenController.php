<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class AccessTokenController extends Controller
{
    //

    public function generate_token(){
        $accountSid =  env('TWILIO_ACCOUNT_SID');
        $apiKeySid =  env('TWILIO_API_KEY_SID');
        $apiKeySecret =  env('TWILIO_API_KEY_SECRET');

        $identity = uniqid();

        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity
        );

        $grant = new VideoGrant();
        $grant->setRoom('cool room');
        $token->addGrant($grant);

        echo $token->toJWT();
    }
}
