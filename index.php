<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savoya
 * @subpackage savoya
 * @since 1.0
 * @version 1.0
 */


get_header();

global $custom_blog_layout;

switch ($custom_blog_layout)
{        
    case "classic":
        get_template_part('/template-parts/blog/blog', 'classic');
        break;
    case "layout_1":
          get_template_part('/template-parts/blog/blog', 'layout-1');
        break;
    default:
          get_template_part('/template-parts/blog/blog', 'classic');
        break;
}

get_footer();