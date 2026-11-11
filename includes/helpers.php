<?php

function isTextLengthInvalid($text, $min, $max)
{
    return strlen($text) < $min || strlen($text) > $max;
}