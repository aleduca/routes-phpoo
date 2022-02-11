<?php
namespace app\database\models;

use app\database\Connection;

class User extends Model
{
    protected string $table = 'users';

    public function teste()
    {
        dd('teste');
    }
}
