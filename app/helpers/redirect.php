<?php


function redirect(string $to)
{
    return header("Location: {$to}");
}
