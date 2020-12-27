<?php


namespace App\Shortcodes;


class HomeShortcode
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
    public function intro2($shortcode, $content, $compiler, $name, $viewData)
    {
        return
            '<h2 class="headline text-thin text-s-size-30">'. $shortcode->title .'</h2>
            <p class="text-size-20">
              '. $shortcode->desc .'
            </p>';
    }

    /**
     * @param $shortcode
     * @param $content
     * @param $compiler
     * @param $name
     * @param $viewData
     * @return string
     * @throws \Exception
     */
    public function intro3($shortcode, $content, $compiler, $name, $viewData)
    {
        return
            '<img
            class="center margin-bottom-30"
            style="margin-top: -210px;"
            src="'. file_store_url('images/'.$shortcode->image) .'"
            alt
          />
          <div class="line">
          <h2 class="headline text-thin text-s-size-30">
              '. $shortcode->title_part1 .'
              <span class="text-primary">'. $shortcode->title_highlighted .'</span> '. $shortcode->title_part2 .'
            </h2>
            <p class="text-size-20 text-s-size-16 text-thin">
              '. $shortcode->desc .'
            </p>
            <i class="icon-more_node_links icon2x text-primary margin-top-bottom-10"></i>
            <p
              class="text-size-20 text-s-size-16 text-thin text-primary"
            >'. lang('intro_section3_bottom_text') .'</p>
          </div>';
    }
}