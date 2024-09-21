<?php

namespace Trendyol\Helpers;

class Request
{
    public static function prepareParams($params)
    {
        return http_build_query($params);
    }

    public static function handleResponse($response)
    {
        return json_decode($response, true);
    }
}
