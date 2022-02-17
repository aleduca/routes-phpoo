<?php

use app\support\Csrf;

function getToken()
{
    return Csrf::getToken();
}
