<?php

use App\Facades\ModulePerms;
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

if (!function_exists('middleware404')) {
    /**
     * @param null $value
     */
    function middleware404($value = null)
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

if (!function_exists('perms')) {
    /**
     * @param array $methodList
     * @param $moduleName
     * @param $method
     * @param bool $ajax
     * @return mixed
     */
    function perms(array $methodList, $moduleName, $method, $ajax = false)
    {
        $check = ModulePerms::check($methodList, $moduleName, $method, $ajax);
        return $check;
    }
}