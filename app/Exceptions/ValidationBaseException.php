<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class ValidationBaseException extends ValidationException
{
   private $error_description = '';

   protected function getErrorDescription()
   {
       return $this->error_description;
   }
}
