<?php

function env(string $index)
{
    return $_ENV[$index] ?? $_SERVER[$index];
}
