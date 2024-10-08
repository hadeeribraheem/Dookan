<?php

namespace App\Exceptions;

use App\Services\API\Messages;
use Exception;
use Flasher\Laravel\Facade\Flasher;

class DuplicateCategoryException extends Exception
{
    protected $message;
    public function __construct()
    {
        $this->message =__('keywords.category_exists_error');
    }
    public function render($request)
    {
        if ($request->expectsJson()) {
            return Messages::error($this->message);
        }
        Flasher::addError(__('keywords.category_exists_error'));
        return redirect()->back();
    }
}
