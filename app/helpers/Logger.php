<?php

namespace App\Helpers;
use Log;

class Logger
{
    /**
     * Summary of Log
     * get data from catch block exception or throwable, and log it to the log file
     * @param \Throwable $th
     * @param mixed $isError
     * @return void
     */
    public static function Log($th, $isError = true)
    {
        $trace = debug_backtrace();
        $caller = $trace[1]['function'];
        if($isError) {
            Log::channel('api')->error('Error in ' . $caller . ': ', [$th->getMessage()]);
        } else {
            Log::channel('api')->info('Info from ' . $caller . ': ', [$th]);
        }
    }

}