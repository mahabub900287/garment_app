<?php

namespace App\Services\Admin\User;

use App\Models\User;
use App\Services\BaseService;
use App\Services\Utilities\FileUploadService;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    protected $model;

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
        $this->model = User::class;
    }

    public function storeOrUpdate($data, $id = null)
    {
        try {
            // Hash password generate
            // Upload image
            if (isset($data['avatar']) && $data['avatar'] != null) {
                try {
                    if ($id) {
                        try {
                            $item = $this->get($id);
                            // Unlink
                            try {
                                if ($item !== null) {
                                    // Remove file
                                    remove_old_image('user/' . $item->avater);
                                }
                            } catch (\Exception $e) {
                            }
                            // Upload avatar to storage
                            $src_path = $this->fileUploadService->uploadFile($data['avatar'], 'user', true);
                            // Store avatar name to data
                            $data['avatar'] = $src_path;
                        } catch (\Exception $e) {
                            $this->logFlashThrow($e);
                        }
                    } else {
                        // Setup avatar name
                        // Upload avatar to storage
                        $src_path = $this->fileUploadService->uploadFile($data['avatar'], 'user', true);
                        // Store avatar name to data
                        $data['avatar'] = $src_path;
                    }
                } catch (\Exception $e) {
                    // dd($e);
                }
            } else {
                unset($data['avatar']);
            }
            if (isset($data['password']) && $data['password'] !== null) {
                // Hash and set the new password
                $data['password'] = Hash::make($data['password']);
            } else {
                // If password is not set or null, remove it from the data array
                unset($data['password']);
            }
            // Call patent method
            return parent::storeOrUpdate($data, $id);
        } catch (\Exception $e) {
            dd($e->getMessage());
            $this->logFlashThrow($e);
        }
    }
}
