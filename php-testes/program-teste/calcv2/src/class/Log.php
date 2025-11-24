<?php

class Log
{

    public function log($msg, $error = false): array
    {
        $date = Date('h:i:s A');
        return $_SESSION['log'][] = [
            "id" => $date,
            "msg" => $msg,
            "error" => $error
        ];
    }
}
