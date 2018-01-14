<?php
if ( ! function_exists( 'zoo_word_limit' ) ) {
    function zoo_word_limit( $text = '', $length = 16, $end = '[&hellip;]' ) {

        $text = strip_shortcodes( $text );

        $text = str_replace(']]>', ']]&gt;', $text);

        $text = wp_trim_words( $text, $length, $end );

        return $text;
    }
}

/**
 * Edit the except length characters.
 *
 */
if ( !function_exists( 'zoo_custom_excerpt_length' ) ) {
    function zoo_custom_excerpt_length() {
        return zoo_kodo_option( 'zoo_blog_excerpt_length' );
    }
}
add_filter( 'excerpt_length', 'zoo_custom_excerpt_length', 999 );

/**
 * Header layout.
 *
 */
if ( !function_exists( 'zoo_header_layout' ) ) {
    function zoo_header_layout() {
        $zoo_header_layout = zoo_kodo_option( 'zoo_header_layout' );

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_header_layout', true ) != '' && get_post_meta( get_the_ID(), 'zoo_header_layout', true ) != 'inherit' ) {
                $zoo_header_layout = get_post_meta( get_the_ID(), 'zoo_header_layout', true );
            }
        }

        return $zoo_header_layout;
    }
}

/**
 * Header stick.
 *
 */
if ( !function_exists( 'zoo_header_stick' ) ) {
    function zoo_header_stick() {
        $zoo_sticky = '';

        if ( zoo_kodo_option( 'zoo_header_sticky' ) ) {
            $zoo_sticky = 'sticker';
        }

        if ( zoo_kodo_option('zoo_site_logo_sticky') != '' ) {
            $zoo_sticky .= ' sticker-image';
        }

        return $zoo_sticky;
    }
}

/**
 * Header transparent.
 *
 */
if ( !function_exists( 'zoo_header_transparent' ) ) {
    function zoo_header_transparent() {
        $zoo_header_transparent = '';

        if ( zoo_kodo_option( 'zoo_header_transparent' ) ) {
            $zoo_header_transparent = 'header-transparent';
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_header_transparent', true ) == '1' ) {
                $zoo_header_transparent = 'header-transparent';
            }
        }

        return $zoo_header_transparent;
    }
}

/**
 * Header fullwidth.
 *
 */
if ( !function_exists( 'zoo_header_fullwidth' ) ) {
    function zoo_header_fullwidth() {
        $zoo_header_fullwidth = '';

        if ( zoo_kodo_option( 'zoo_header_fullwidth' ) ) {
            $zoo_header_fullwidth = 'full-width';
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_header_fullwidth', true ) == '1' ) {
                $zoo_header_fullwidth = 'full-width';
            }
        }

        return $zoo_header_fullwidth;
    }
}

/**
 * Header top.
 *
 */
if ( !function_exists( 'zoo_enable_header_top' ) ) {
    function zoo_enable_header_top() {
        $zoo_header_top = false;

        if ( get_theme_mod( 'zoo_header_top', '1' ) ) {
            $zoo_header_top = true;
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_header_top', true ) == '1' ) {
                $zoo_header_top = false;
            }
        }

        return $zoo_header_top;
    }
}

/**
 * Footer layout
 *
 */
if ( !function_exists( 'zoo_footer_layout' ) ) {
    function zoo_footer_layout() {
        $zoo_footer_layout='default';

        if( zoo_kodo_option( 'zoo_footer_layout' ) != '' ) {
            $zoo_footer_layout = zoo_kodo_option( 'zoo_footer_layout' );
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_footer_layout', true ) != '' && get_post_meta( get_the_ID(), 'zoo_footer_layout', true ) != 'inherit' ) {
                $zoo_footer_layout = get_post_meta( get_the_ID(), 'zoo_footer_layout', true );
            }
        }

        return $zoo_footer_layout;
    }
}

/**
 * Footer top.
 *
 */
if ( !function_exists( 'zoo_top_footer' ) ) {
    function zoo_top_footer() {
        $zoo_top_footer = false;

        if ( zoo_kodo_option( 'zoo_top_footer' ) ) {
            $zoo_top_footer = true;
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_top_footer', true ) == '1' ) {
                $zoo_top_footer = false;
            }
        }

        return $zoo_top_footer;
    }
}

/**
 * Footer main.
 *
 */
if ( !function_exists( 'zoo_main_footer' ) ) {
    function zoo_main_footer() {
        $zoo_main_footer = false;

        if ( zoo_kodo_option( 'zoo_main_footer' ) ) {
            $zoo_main_footer = true;
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_main_footer', true ) == '1' ) {
                $zoo_main_footer = false;
            }
        }

        return $zoo_main_footer;
    }
}

/**
 * Footer social.
 *
 */
if ( !function_exists( 'zoo_footer_social' ) ) {
    function zoo_footer_social() {
        $zoo_footer_social = false;

        if ( zoo_kodo_option( 'zoo_footer_social' ) ) {
            $zoo_footer_social = true;
        }

        if ( is_page() || is_single() ) {
            if ( get_post_meta( get_the_ID(), 'zoo_footer_social', true ) == '1' ) {
                $zoo_footer_social = true;
            }
        }

        return $zoo_footer_social;
    }
}

/**
 * Check sidebar layout use on post/archive/category.
 *
 */
if ( !function_exists( 'zoo_get_sidebar' ) ) {
    function zoo_get_sidebar( $sidebar = 'left' ) {

        if ( $sidebar == 'left' ) {
            $sidebar = 'zoo_blog_sidebar_left';
        } else {
            $sidebar = 'zoo_blog_sidebar_right';
        }

        $sidebar_config = ( zoo_kodo_option( $sidebar ) != '' ) ? zoo_kodo_option( $sidebar ) : 'none';

        if ( is_single() && get_post_meta( get_the_ID(), $sidebar, true ) != 'inherit' && get_post_meta( get_the_ID(), $sidebar, true ) != '' ) {
            $sidebar_config = get_post_meta( get_the_ID(), $sidebar, true );
        }

        return $sidebar_config;
    }
}

/**
 * Edit password form.
 *
 */
if ( !function_exists( 'zoo_password_form' ) ) {
    function zoo_password_form() {
        global $post;

        $zoo_id = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );

        $zoo_form = '
        <div class="zoo-form-login">
            <form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
                <h4>' . esc_html__( 'To view this protected post, enter the password below:','zoo-kodo' ) . '</h4>
                <input name="post_password" id="' . $zoo_id . '" type="password" size="20" maxlength="20" placeholder="' . esc_attr__( 'Enter Password','zoo-kodo' ) . ' " />
                <br>
                <input type="submit" name="Submit" value="' . esc_attr__( 'Submit', 'zoo-kodo' ) . '" />
            </form>
        </div>';

        return $zoo_form;
    }
}
add_filter( 'the_password_form', 'zoo_password_form' );

// Language
if ( !function_exists( 'zoo_language_selector' ) ) {
  function zoo_language_selector() {
      if ( in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
          $languages = icl_get_languages('skip_missing=0&orderby=code');
          if(!empty($languages)){
              $active="";
              echo '<div id ="language-switch">';
                echo '<ul class="languages">';
                foreach($languages as $l){
                    echo '<li>';
                    if($l['country_flag_url']){
                        if(!$l['active']) echo '<a href="'.$l['url'].'">';
                        echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                        if(!$l['active']) echo '</a>';
                    }
                    if(!$l['active']) echo '<a href="'.$l['url'].'">';
                    echo icl_disp_language($l['native_name'], $l['translated_name']);
                    if(!$l['active']) echo '</a>';
                    echo '</li>';
                }
                echo '</ul>';
              echo '</div>';
          }
      }
      else{?>
          <div id ="language-switch">
              <ul class="languages">
                  <li>
                      <a href="#" class="ltr-en">
                          <img width="18" height="12" alt="en" src="<?php echo get_template_directory_uri(); ?>/assets/images/gb.png">
                          <span class="icl_lang_sel_current"><?php echo esc_html__('English', 'zoo-kodo'); ?></span>
                      </a>
                  </li>
                  <li>
                      <a class="rtl-ar" href="#">
                          <img width="18" height="12" alt="ar" src="<?php echo get_template_directory_uri(); ?>/assets/images/ar.png">
                          <span class="icl_lang_sel_current"><?php echo esc_html__('Arabic', 'zoo-kodo'); ?></span>
                      </a>
                  </li>
              </ul>
          </div>
      <?php }
  }
}

if ( !function_exists( 'zoo_get_embed' ) ) {
  function zoo_get_embed( $url, $width = 560, $height = 350 ) {
    $args = array();

    $args['width'] = $width;
    $args['height'] = $height;

    // Try oembed first.
    $embed = wp_oembed_get( $url, $args );

    $embed = preg_replace("/height=\"[0-9]*\"/", '', $embed);

    if ( $height != 'auto' && $height != '100%') {
      $height = intval($height) . 'px';
    }

    if ( $width != 'auto' && $width != '100%') {
      $width = intval($width) . 'px';
    }

    $embed = preg_replace("/width=\"[0-9]*\"/", 'class="iframe-responsive" style="width: ' . $width . '; height: ' . $height . '"', $embed);

    // If no oembed provides found, try WordPress auto embed.
    if ( ! $embed ) {
      $embed = $GLOBALS['wp_embed']->shortcode( $args, $url );
    }

    return $embed ? $embed : esc_html__( 'Embed HTML not available.', 'zoo-kodo' );
  }
}

/* Config header cover */
if(!function_exists('zoo_page_cover')){
    function zoo_page_cover() {
        $zoo_meta_status = get_post_meta(get_the_ID(),'zoo_page_cover',true);
        $result = array();
        if(is_page() || is_single()){
            $result['image'] = '';
            $result['color'] = '';
            $result['height'] = '';
            $result['title'] = '';
            $result['des']   = '';
            $result['title_color'] = '';
            $result['des_color']   = '';

            if($zoo_meta_status == 'inherit' || $zoo_meta_status == ''){
                $zoo_cus_status = get_theme_mod('zoo_page_cover','none');
                switch ($zoo_cus_status) {
                    case 'color':
                        $result['color'] = get_theme_mod('zoo_page_cover_color','#dc2f47');
                        $result['height'] = get_theme_mod('zoo_page_cover_height','');
                        $result['title'] = get_theme_mod('zoo_page_cover_title','');
                        $result['title_color'] = get_theme_mod('zoo_page_cover_title_color','#fff');
                        $result['des'] = get_theme_mod('zoo_page_cover_des','');
                        $result['des_color'] = get_theme_mod('zoo_page_cover_des_color','#fff');
                        break;
                    case 'image':
                        $result['image'] = get_theme_mod('zoo_page_cover_image','');
                        $result['height'] = get_theme_mod('zoo_page_cover_height','');
                        $result['title'] = get_theme_mod('zoo_page_cover_title','');
                        $result['title_color'] = get_theme_mod('zoo_page_cover_title_color','#fff');
                        $result['des']   = get_theme_mod('zoo_page_cover_des','');
                        $result['des_color'] = get_theme_mod('zoo_page_cover_des_color','#fff');
                        break;
                    case 'none':
                        $result['image'] = '';
                        $result['color'] = '';
                        $result['height'] = '';
                        $result['title'] = '';
                        $result['des']   = '';
                        $result['title_color'] = '';
                        $result['des_color']   = '';
                        break;   
                    default:
                        break;
                }

            }
            else if($zoo_meta_status == 'none'){
                $result['image'] = '';
                $result['color'] = '';
                $result['height'] = '';
                $result['title'] = '';
                $result['des']   = '';
                $result['title_color'] = '';
                $result['des_color']   = '';
            }
            else{
                switch ($zoo_meta_status) {
                    case 'color':
                        $result['color'] = get_post_meta(get_the_ID(),'zoo_page_cover_color',true);
                        $result['height'] = get_post_meta(get_the_ID(),'zoo_page_cover_height',true);
                        $result['title'] = get_post_meta(get_the_ID(),'zoo_page_cover_title',true);
                        $result['title_color'] = get_post_meta(get_the_ID(),'zoo_page_cover_title_color',true);
                        $result['des']   = get_post_meta(get_the_ID(),'zoo_page_cover_des',true);
                        $result['des_color'] = get_post_meta(get_the_ID(),'zoo_page_cover_des_color',true);
                        break;
                    case 'image':
                        $result['image_'] = wp_get_attachment_image_src(get_post_meta(get_the_ID(),'zoo_page_cover_image',true),'full');
                        $result['image'] = $result['image_'][0];
                        $result['height'] = get_post_meta(get_the_ID(),'zoo_page_cover_height',true);
                        $result['title'] = get_post_meta(get_the_ID(),'zoo_page_cover_title',true);
                        $result['title_color'] = get_post_meta(get_the_ID(),'zoo_page_cover_title_color',true);
                        $result['des']   = get_post_meta(get_the_ID(),'zoo_page_cover_des',true);
                        $result['des_color'] = get_post_meta(get_the_ID(),'zoo_page_cover_des_color',true);
                        break;
                    case 'none':
                        $result['image'] = '';
                        $result['color'] = '';
                        $result['height'] = '';
                        $result['title'] = '';
                        $result['des']   = '';
                        $result['title_color'] = '';
                        $result['des_color']   = '';
                        break;   
                    default:
                        break;
                }
            }
            return $result;
        }

    }
}
