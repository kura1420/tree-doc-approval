<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    //
    public function index()
    {
        $user = auth()->user();

        $rows = [
            [
                'name' => 'Name',
                'value' => $user->name,
                'group' => 'Profile',
                'editor' => [
                    'type' => 'text',
                    'options' => [
                        'required' => TRUE,
                    ],
                ],
            ],
            [
                'name' => 'Email',
                'value' => $user->email,
                'group' => 'Profile',
                'editor' => [
                    'type' => 'text',
                    'options' => [
                        'required' => TRUE,
                        'validType' => 'email',
                    ],
                ],
            ],
            [
                'name' => 'Password',
                'value' => NULL,
                'group' => 'Profile',
                'editor' => 'passwordbox',
            ],
        ];

        $result = [
            'total' => count($rows),
            'rows' => $rows
        ];
        $message = 'OK';

        return $this->sendResponse($result, $message);
    }

    public function update(UserProfileUpdateRequest $request)
    {
        try {
            $field = $request->all();
    
            if ($request->password) {
                $field['password'] = bcrypt($request->password);
            } else {
                unset($field['password']);
            }
    
            $row = User::findOrFail(auth()->user()->id);
            
            $row->update($field);
    
            $result = auth()->user();
            $message = 'Update profile success';
    
            return $this->sendResponse($result, $message);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $errorMessages = $e->getMessage();

            return $this->sendError($error, $errorMessages, 500);
        }
    }
}
