<?php


namespace App\Shortcodes;


class StaticShortcode
{
    /**
     * @param $shortcode
     * @param $content
     * @param $compiler
     * @param $name
     * @param $viewData
     * @return string
     * @throws \Exception
     */
    public function content($shortcode, $content, $compiler, $name, $viewData)
    {
        return
            '<img src="'. file_store_url('images/'.$shortcode->image) .'">
               '. $content .'
            </div>';
    }
}