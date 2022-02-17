<?php
namespace app\support;

use app\traits\Validations;
use Exception;

class Validate
{
    use Validations;

    public function validate(array $validationsFields)
    {
        foreach ($validationsFields as $field => $validation) {
            $havePipes = str_contains($validation, '|');

            if (!$havePipes) {
                $param = '';

                if (substr_count($validation, ':') === 1) {
                    [$validation, $param] = explode(':', $validation);
                }

                if (!method_exists($this, $validation)) {
                    throw new Exception("O método {$validation} não existe na validação");
                }

                // dd($methodValidation);

                $this->$validation($param);

                // dd($methodValidation, $param);
            }
        }
    }
}
