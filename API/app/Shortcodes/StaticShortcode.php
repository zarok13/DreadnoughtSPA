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
            '<div class="s-12 m-12 l-4 margin-m-bottom">
                <img class="margin-bottom" src="'. file_store_url('images/'.$shortcode->image) .'" alt="">
               '. $content .'
            </div>';
    }
}