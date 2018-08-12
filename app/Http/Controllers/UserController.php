<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB; 
use Validator;

class UserController extends Controller {
	
	public $successStatus = 200;

	public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    public function me() {
        $user = Auth::user(); 

        $familyMember = DB::table("family_members")->where("user_id", $user->id)->first();
        $family = DB::table("families")->where("id", $familyMember->family_id)->first();
        
        $familyMember->family = $family;
        $user->family_member = $familyMember;

        return response()->json($user, $this-> successStatus); 
    }

    public function logout() {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json(null, 204);
    }
}
?>