<?php

if (! function_exists('attachment_path')) {
    /**
     * @param string $path
     *
     * @return string
     */
    function attachment_path($path = '')
    {
        return public_path($path ? 'attachments'.DIRECTORY_SEPARATOR.$path : 'attachments');
    }
}




