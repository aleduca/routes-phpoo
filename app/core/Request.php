<?php
namespace app\core;

use Exception;

class Request
{
    public static function input(string $name)
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }

        throw new Exception("O índice {$name} não existe");
    }


    public static function all()
    {
        return $_POST;
    }

    public static function only(string|array $only)
    {
        $fieldsPost = self::all();
        $fieldsPostkeys = array_keys($fieldsPost);

        // dd($fieldsPostkeys);

        $arr = [];
        foreach ($fieldsPostkeys as $index => $value) {
            $onlyField = (is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null));
            if (isset($fieldsPost[$onlyField])) {
                $arr[$onlyField] = $fieldsPost[$onlyField];
            }
            // echo $value . ' ' .$onlyField .'<br />';
            // if ($value !== $onlyField) {
            //     unset($fieldsPost[$value]);
            // }
        }

        return $arr;
    }

    public static function excepts(string|array $excepts)
    {
        $fieldsPost = self::all();

        if (is_array($excepts)) {
            foreach ($excepts as $index => $value) {
                unset($fieldsPost[$value]);
            }
        }

        if (is_string($excepts)) {
            unset($fieldsPost[$excepts]);
        }

        return $fieldsPost;
    }

    public static function query($name)
    {
        if (!isset($_GET[$name])) {
            throw new Exception("Não existe a query string {$name}");
        }
        return $_GET[$name] ;
    }

    public static function toJson(array $data)
    {
        return json_encode($data);
    }

    public static function toArray(string $data)
    {
        if (isJson($data)) {
            return json_decode($data);
        }
    }
}
