<?php
namespace app\traits;

trait Validations
{
    public function unique()
    {
    }

    public function email()
    {
    }

    public function required()
    {
        dd('required');
    }

    public function maxLen($param)
    {
        dd($param);
    }
}
