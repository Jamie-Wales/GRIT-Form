<?php
namespace core;
class RequestLimiter
{
    const MAX_REQUESTS = 10;
    const TIME_FRAME = 360;

    public static function checkRateLimit()
    {
        if (isset($_SESSION['request_count']) && $_SESSION['request_count'] >= self::MAX_REQUESTS) {
            if (time() - $_SESSION['first_request_time'] < self::TIME_FRAME) {
                http_response_code(429);
                exit('Rate limit exceeded');
            } else {
                $_SESSION['request_count'] = 0;
                $_SESSION['first_request_time'] = time();
            }
        }

        $_SESSION['request_count'] = isset($_SESSION['request_count']) ? $_SESSION['request_count'] + 1 : 1;
        if (!isset($_SESSION['first_request_time'])) {
            $_SESSION['first_request_time'] = time();
        }
    }
}
?>