<?php

use Illuminate\Support\Str;

function PresentPrice($price)
{
    return '$' . number_format($price / 100, 2);
}

function limit_word($word)
{
    return Str::limit($word, 100);
}
