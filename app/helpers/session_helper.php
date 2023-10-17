<?php
function flash($type, $message = null) 
{
    if (is_null($message)) {
        if (isset($_SESSION['flash_message'])) {
            $message = $_SESSION['flash_message'];
            $class = $_SESSION['flash_message_type'];
            unset($_SESSION['flash_message']);
            unset($_SESSION['flash_message_type']);
            return '<div class="alert ' . $class . ' entering" id="msg-flash">' . $message . '</div>';
        }
    } else {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_message_type'] = 'alert alert-' . $type;
        return '<div class="alert ' . $_SESSION['flash_message_type'] . ' entering" id="msg-flash">' . $message . '</div>';
    }
}
