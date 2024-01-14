<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('imHere')) {
    function imHere($param = null)
    {
        return $param ? dd($param) : dd('I am Here');
    }
}

function get_current_route_name()
{
    return Route::current()->getName();
}
if (! function_exists('random_number')) {
    function random_number()
    {
        return random_int(100000, 999999);
    }
}

if (! function_exists('str_limit')) {

    function str_limit($string, $limit, $end = '...')
    {
        return Str::limit($string, $limit, $end);
    }
}

if (! function_exists('get_storage_image')) {

    function get_storage_image($path, $name, $type = 'normal')
    {
        $full_path = '/storage/'.$path.'/'.$name;
        if ($name) {
            $image_path = storage_path('app/public/'.$path.'/'.$name);
            if (file_exists($image_path)) {
                return asset($full_path);
            }
        }

        return get_default_image($type);
    }
}

if (! function_exists('get_storage_file')) {
    function get_storage_file($path, $name)
    {
        $full_path = '/storage/'.$path.'/'.$name;
        if ($name) {
            return asset($full_path);
        }

        return get_default_image();
    }
}

if (! function_exists('get_default_image')) {

    function get_default_image($type = 'normal')
    {
        if ($type == 'user') {
            return asset('/images/user_default.png');
        } elseif ($type == 'normal') {
            return asset('/images/default.png');
        }
    }
}
// remove old image
function remove_old_image($image_path = null)
{
    if (isset($image_path)) {
        if (Storage::exists($image_path)) {
            Storage::delete($image_path);
        }
    }
}

if (! function_exists('generate_slug')) {
    function generate_slug($value)
    {
        try {
            return preg_replace('/\s+/u', '-', trim($value));
        } catch (\Exception $e) {
            return '';
        }
    }
}

if (! function_exists('record_custom_flash')) {

    function record_custom_flash($message = null)
    {
        Session::flash('custom', $message ?? 'Record modified successfully');
    }
}

if (! function_exists('record_created_flash')) {

    function record_created_flash($message = null)
    {
        Session::flash('success', $message ?? 'Record created successfully');
    }
}

if (! function_exists('record_updated_flash')) {

    function record_updated_flash($message = null)
    {
        Session::flash('update', $message ?? 'Record updated successfully');
    }
}

if (! function_exists('record_verified_flash')) {

    function record_verified_flash($message = null)
    {
        Session::flash('verified', $message ?? 'Record updated successfully');
    }
}

if (! function_exists('file_uploaded_flash')) {

    function file_uploaded_flash($message = null)
    {
        Session::flash('file_uploaded', $message ?? 'Record updated successfully');
    }
}

if (! function_exists('record_deleted_flash')) {

    function record_deleted_flash($message = null)
    {
        Session::flash('delete', $message ?? 'Record deleted successfully');
    }
}

if (! function_exists('something_wrong_flash')) {

    function something_wrong_flash($message = null)
    {
        Session::flash('error', $message ?? 'Something is wrong!');
    }
}

if (! function_exists('custom_flash')) {

    function custom_flash($title = null, $message = null)
    {
        Session::flash('custom_title', $title);
        Session::flash('custom_message', $message);
    }
}

if (! function_exists('log_error')) {

    function log_error(Exception $e)
    {
        Log::error($e->getMessage());
    }
}

if (! function_exists('getImage')) {
    function getImage($image = null, $type = null)
    {
        if ($image && Storage::disk('public')->exists($image)) {
            return Storage::disk('public')->url($image);
        } else {
            return asset('/images/default.png');
        }
    }
}


