<?php

/**
 * This file intentionally omits declare(strict_types=1) to simulate user code
 * that passes the port as a string. Without strict types, PHP coerces the
 * string for mysqli but the OpenTelemetry hook still receives the raw string
 * in the params array.
 */

namespace OpenTelemetry\Tests\Instrumentation\MySqli\Integration;

use mysqli;

class NonStrictTypesConnector
{
    public static function connectWithStringPort(string $host, string $user, string $passwd, string $database, string $port): mysqli
    {
        return new mysqli($host, $user, $passwd, $database, $port);
    }

    public static function proceduralConnectWithStringPort(string $host, string $user, string $passwd, string $database, string $port): mysqli|false
    {
        return mysqli_connect($host, $user, $passwd, $database, $port);
    }
}
