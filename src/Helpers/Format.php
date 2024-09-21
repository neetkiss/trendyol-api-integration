<?php

namespace Trendyol\Helpers;

class Format
{
    public static function formatDate($date)
    {
        return date('Y-m-d\TH:i:s', strtotime($date));
    }
}
