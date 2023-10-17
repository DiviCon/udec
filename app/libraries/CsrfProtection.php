<?php

class CsrfProtection
{
    private const TOKEN_LENGTH = 32;

    public static function check($origin, $session)
    {
        self::ensureCsrfTokenExists($origin, $session);

        if (hash_equals($origin['csrf_token'], $session['csrf_token'])) {
            return true;
        } else {
            throw new CsrfException("CSRF token mismatch");
        }
    }

    public static function generate()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = self::generateCsrfToken();
        }

        return $_SESSION['csrf_token'];
    }

    private static function ensureCsrfTokenExists($origin, $session)
    {
        if (!isset($origin['csrf_token'], $session['csrf_token'])) {
            throw new CsrfException("CSRF token missing");
        }
    }

    private static function generateCsrfToken()
    {
        return bin2hex(random_bytes(self::TOKEN_LENGTH)); // Generate a random token
    }
}

class CsrfException extends \Exception
{
    // Custom CSRF exception class
    public function __construct($message = "", $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
