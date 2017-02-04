<?php

use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('ddd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function ddd()
    {
        array_map(function ($x) {
            (new VarDumper)->dump($x);
        }, func_get_args());

        die(1);
    }
}

if (! function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string  $path
     * @return string
     */
    function config_path($path = '')
    {
        return base_path() . ($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}
