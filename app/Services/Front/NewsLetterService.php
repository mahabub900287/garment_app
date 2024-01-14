<?php

namespace App\Services\Front;

use App\Models\NewsLetter;
use App\Services\BaseService;

class NewsLetterService extends BaseService
{
    protected $model;

    public function __construct()
    {
        $this->model = NewsLetter::class;
    }

    public function storeOrUpdate($data, $id = null)
    {
        try {
            return parent::storeOrUpdate($data, $id);
        } catch (\Exception $e) {
            $this->logFlashThrow($e);
        }
    }
}
