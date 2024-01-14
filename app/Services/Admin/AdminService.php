<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Services\BaseService;
use App\Services\Utilities\FileUploadService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class AdminService extends BaseService
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
            if ($data['password'] !== null) {
                $data['password'] = Hash::make($data['password']);

                return parent::storeOrUpdate($data, $id);
            } else {
                $value = Arr::except($data, ['password', 'password']);
                return parent::storeOrUpdate($value, $id);
            }
            // Call patent method

        } catch (\Exception $e) {
            $this->logFlashThrow($e);
        }
    }
}
