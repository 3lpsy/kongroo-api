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
