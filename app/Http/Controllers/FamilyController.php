<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Tenant;
use App\User;
use App\Family;
use App\FamilyMember;

class FamilyController extends Controller
{

    public function get($id, Request $request) {
        if (!$id) {
           throw new HttpException(400, "Invalid id");
        }

        $family = DB::table("families")->where("id", $id)->first();
        if ($family) {
            return response()->json($family, 200);
        } else {
            return response()->json(['message'=>"Family not found"], 404);
        }
    }

    public function members($id, Request $request) {
        if (!$id) {
           throw new HttpException(400, "Invalid id");
        }

        $familyMembers = DB::table("family_members")->where("family_id", $id)->get();
        if ($familyMembers) {
            return response()->json($familyMembers, 200);
        } else {
            return response()->json(['message'=>"Family not found"], 404);
        }
    }

    public function getMember($id, $member_id, Request $request) {
        if (!$id || !$member_id) {
           throw new HttpException(400, "Invalid id");
        }

        $familyMember = DB::table("family_members")->where("id", $member_id)->first();
        if ($familyMember) {
            return response()->json($familyMember, 200);
        } else {
            return response()->json(['message'=>"Family member not found"], 404);
        }
    }
}
