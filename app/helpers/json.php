<?php

function isJson(string $data)
{
    json_decode($data);

    return json_last_error() === JSON_ERROR_NONE;
}
