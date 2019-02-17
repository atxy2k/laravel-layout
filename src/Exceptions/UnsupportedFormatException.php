<?php namespace Atxy2k\Layout\Exceptions;
/**
 * Created by PhpStorm.
 * User: atxy2k
 * Date: 16/2/2019
 * Time: 20:46
 */

use Exception;

class UnsupportedFormatException extends Exception
{
    protected $message = 'Incompatible format for foreach';
}
