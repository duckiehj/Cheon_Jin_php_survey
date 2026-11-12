/**
*Use one function to check answer lengths.
*This avoids writing same check for each question. 
*Use class work
*Example: isTextLengthInvalid($firstName, 3, 30), return if name has less than 3 or more than 30 characters*/


<?php

function isTextLengthInvalid($text, $min, $max)
{
    return strlen($text) < $min || strlen($text) > $max;
}