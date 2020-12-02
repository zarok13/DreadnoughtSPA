<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('setting')) {
    /**
     * @param null $settingItem
     * @return \Illuminate\Config\Repository|mixed
     * @throws Exception
     */
    function setting($settingItem = null)
    {
        if (!empty($settingItem)) {
            return config('settings.' . $settingItem);
        } else {
            throw new Exception(__FUNCTION__ . ' - item is empty');
        }
    }
}

if (!function_exists('urlLang')) {
    /**
     * @return string|null
     */
    function urlLang()
    {
        $langList = config('settings.langList');
        if (request()->segment(1) == ADMIN_PANEL_SEGMENT_NAME) {
            $currLang = request()->segment(ADMIN_LANGUAGE_SEGMENT_NUM);
        } else {
            $currLang = request()->segment(LANGUAGE_SEGMENT_NUM);
        }
        if (empty($currLang) || empty($langList[$currLang])) {
            $currLang = key($langList);
        }
        return $currLang;
    }
}

if (!function_exists('statimg')) {
    /**
     * @param null $imgPath
     * @param bool $admin
     * @return string
     * @throws Exception
     */
    function statimg($imgPath = null, $admin = false)
    {
        if (empty($imgPath)) {
            throw new Exception('You must set the image path');
        }
        if ($admin == true) {
            return env('APP_URL') . '/images/admin/' . $imgPath;
        } else {
            return env('APP_URL') . '/images/' . $imgPath;
        }

    }
}

if (!function_exists('file_store_url')) {
    /**
     * @param string $url
     * @param string $disk
     * @return string
     * @throws Exception
     */
    function file_store_url($url = '', $disk = 'public')
    {
        $filesystems = config('filesystems');
        if (isset($filesystems['disks'][$disk]['url'])) {
            $url = !empty($url) ? '/' . $url : $url;
            return $filesystems['disks'][$disk]['url'] . $url;
        }
        throw new Exception('error', __FUNCTION__ . ' - Unknown disk: "' . $disk . '"');
    }
}

if (!function_exists('lang')) {

    /**
     * @param $keyword
     * @return \Illuminate\Config\Repository|mixed
     */
    function lang($keyword)
    {
        return config('languages.' . $keyword);
    }
}

if (!function_exists('hel_field')) {

    /**
     * @param $keyword
     * @return \Illuminate\Config\Repository|mixed
     */
    function hel_field($keyword)
    {
        return config('helper_fields.' . $keyword);
    }
}

if (!function_exists('getActionIcon')) {

    /**
     * @param $actionTitle
     * @return string
     */
    function getActionIcon($actionTitle)
    {
        return ' <i class="fas fa-arrow-right fa-xs"></i> ' . $actionTitle;
    }
}

if (!function_exists('getPageTypeUrl')) {
    /**
     * @param $pageTypeID
     * @param string $itemID
     * @return mixed
     * @throws Exception
     */
    function getPageTypeUrl($pageTypeID, $itemID = '')
    {
        $pageType = getPageType($pageTypeID);
        $pageTypeList = (array)setting('pageTypes');
        if (in_array($pageType, $pageTypeList)) {
            if ($pageType == PAGE_TYPE_STATIC) {
                return route('pages.editPage', ['id' => $itemID]);
            } else {
                return route($pageType, ['id' => $itemID]);
            }
        } else {
            throw new \Exception(__METHOD__ . ' - (' . $pageType . ') pageType does not have url');
        }
    }
}

if (!function_exists('getPageType')) {
    /**
     * @param $pageType
     * @return mixed
     * @throws Exception
     */
    function getPageType($pageType)
    {
        $pageTypeList = setting('pageTypes');
        if (!isset($pageTypeList[$pageType])) {
            throw new \Exception(__METHOD__ . ' - Wrong pageType index: ' . $pageType);
        }
        return $pageTypeList[$pageType];
    }
}

if (!function_exists('page404')) {
    /**
     * @param null $value
     */
    function page404($value = null)
    {
        if (empty($value)) {
            abort(404);
        }
    }
}

if (!function_exists('array_index_to_value')) {
    /**
     * @param array $array
     * @return array
     */
    function array_index_to_value(array $array)
    {
        foreach ($array as $index => $value) {
            unset($array[$index]);
            $array[$value] = $value;
        }
        return $array;
    }
}

if (!function_exists('cacheClear')) {
    /**
     * clear cache
     */
    function cacheClear()
    {
        Cache::flush();
    }
}

if (!function_exists('highlightSearchResults')) {
    /**
     * @param $search_text
     * @param $content
     * @return mixed
     */
    function highlightSearchResults($search_text, $content)
    {
        $content = trim($content);
        $content = strip_tags($content);
        $result = str_ireplace($search_text, '<span class="search_highlight">' . $search_text . '</span>', $content);
        return $result;
    }
}

if (!function_exists('trimText')) {
    /**
     * @param $text
     * @param $length
     * @return string
     */
    function trimText($text, $length)
    {
        if (mb_strlen($text) >= $length) {
            $newLine = null;
            while ($length) {
                $newLine = strpos($text, ' ', $length);
                if (empty($newLine)) {
                    $length--;
                } else {
                    break;
                }
            }
            $length = $newLine + 1;
            $trimmedTitle = substr($text, 0, $length) . "...";
            return $trimmedTitle;
        }
        return $text;
    }
}
