<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles'])->get());
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => '',
            'mobile' => '',
            'email' => 'email',
            'password' => ''
        ]);

        if($request->has('mobile') && $request->has('otp'))
        {
            $user = User::with(['roles'])->when($request->has('mobile') && $request->has('otp'), function($query) use ($request) {
                $query->where('mobile', $request->mobile);
            })->first();
        }
        else
        {
            if($request->has('email') && $request->has('password'))
            {
                $user = User::with(['roles'])->updateOrCreate([
                    'email' => $request->email,
                ],[
                    'email' => $request->email,
                    'password' => $request->password,
                ]);
            }
            else
            {
                $user = User::with(['roles'])->updateOrCreate([
                    'mobile' => $request->mobile,
                    "mobile_verified_at" => Carbon::now(),
                ],[
                    'mobile' => $request->mobile,
                    'password' => $request->password,
                ]);
            }
        }

        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token' => $authToken,
            'user' => $user,
        ]);
    }

    public function getOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'min:10',
            'otp' => ''
        ]);

        $credentials = User::updateOrcreate([
            'mobile' => $request->mobile,
        ],[
            'mobile' => $request->mobile,
            'otp' => random_int(1000,9999),
        ]);

        $success = $credentials->otp;
        if($success)
        {
            return response()->json([
                'is_success' => True
            ]);
        }
        else
        {
            return response()->json([
                'is_success' => 'Otp not Generated',
            ]);
        }
//
    }

    public function accessToken(Request $request)
    {
        if (Auth::check()) {
            return response()->json([
                'is_success' => true
            ], 200);
        }
        else
        {
            return response()->json([
                'is_success' => false
            ], 200);
        }
    }

    public function firebaseToken(Request $request)
    {

        $user = User::where('id', auth()->id())->update([
            'firebase_token' => $request->firebase_token,
            'device_token'   => $request->device_token,
            'device_type'    => $request->device_type,
            'device'         => $request->device,
        ]);
        return response()->json([
            "is_success" => true,
            "message" => "User updated successfully.",
            "user" => $user
        ]);
    }

    public function userUpdate(Request $request)
    {
        $user = User::where('id', auth()->id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'bio' => $request->bio,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);
        return response()->json([
            "success" => true,
            "message" => "User updated successfully.",
            "user" => $user
        ]);
    }

    public function loginUserProfile(Request $request)
    {
        $id = auth()->id();

        $user = User::with(['roles'])->find($id);

        return response()->json([
           "user" => $user,
        ]);
    }

//    public function mobileLogin(Request $request)
//    {
//        $request->validate([
//            'mobile' => 'min:10',
//            'otp' => ''
//        ]);
//
//        $user = User::where([['mobile', $request->mobile],['otp', $request->otp]])->first();
//        $authToken = $user->createToken('auth-token')->plainTextToken;
//
//        return response()->json([
//            'access_token' => $authToken,
//        ]);
//
//    }

//    public function register(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:8',
//        ]);
//
//        $credentials = request(['name','email', 'password']);
//        $credentials['password'] = Hash::make($credentials['password']);
//
//        $user = User::create($credentials);
//        $success['token'] =  $user->createToken('auth-token')->plainTextToken;
//        return response()->json([
//            'access_token' => "Successfully registered User",
//        ]);
//    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('user_profile', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('user_profile'))))->toMediaCollection('user_profile');
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('user_profile', false)) {
            if (!$user->user_profile || $request->input('user_profile') !== $user->user_profile->file_name) {
                if ($user->user_profile) {
                    $user->user_profile->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('user_profile'))))->toMediaCollection('user_profile');
            }
        } elseif ($user->user_profile) {
            $user->user_profile->delete();
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
