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

// app/helpers.php

function gravatar_profile_url($email)
{
    return sprintf("//www.gravatar.com/%s", md5($email));
}

function gravatar_url($email, $size = 72)
{
    return sprintf("//www.gravatar.com/avatar/%s?s=%s", md5($email), $size);
}

// FontAwesome icon() 헬퍼

if (! function_exists('icon')) {
    function icon($class, $addition = 'icon', $inline = null) {
        $icon   = config('icons.' . $class);
        $inline = $inline ? 'style="' . $inline . '"' : null;

        return sprintf('<i class="%s %s" %s></i>', $icon, $addition, $inline);
    }
}

