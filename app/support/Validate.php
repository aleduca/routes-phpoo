<?php
namespace app\support;

use app\traits\Validations;
use Exception;

class Validate
{
    use Validations;

    public function validate(array $validationsFields)
    {
        $inputsValidation = [];
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
                $inputsValidation[$field] = $this->$validation($field, $param);

            // dd($methodValidation, $param);
            } else {
                $validations = explode('|', $validation);
                $param = '';
                foreach ($validations as $validation) {
                    if (substr_count($validation, ':') === 1) {
                        [$validation, $param] = explode(':', $validation);
                    }

                    if (!method_exists($this, $validation)) {
                        throw new Exception("O método {$validation} não existe na validação");
                    }

                    $inputsValidation[$field] = $this->$validation($field, $param);

                    // var_dump($inputsValidation[$field]);

                    if (empty($inputsValidation[$field])) {
                        break;
                    }
                }
            }
        }

        Csrf::validateToken();

        if (in_array(null, $inputsValidation, true)) {
            return null;
        }

        return $inputsValidation[$field];
    }
}
