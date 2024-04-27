<?php

/**
 * Get icons from assets folder.
 * $icon string icon name. 
 */
function rtcamp_get_icon($icon)
{
    if (empty($icon)) return '';

    return RTCAMP_URL . '/assets/icons/' . $icon . '.svg';
}
