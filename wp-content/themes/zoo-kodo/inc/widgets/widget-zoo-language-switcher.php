<?php
/**
 * Zoo Language Switcher Widget
 *
 * @package     Zoo Kodo
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

if ( !class_exists('ZooLanguageSwitcherWidget') ) {
    class ZooLanguageSwitcherWidget extends WP_Widget
    {

        function __construct()
        {
            $widget_ops = array(
              'classname' => 'zoo-language-switcher-widget',
              'description' => esc_html__('Displays your language switcher.', 'zoo-kodo')
            );

            parent::__construct(
              null,
              esc_html__('Zoo - Language switcher', 'zoo-kodo'),
              $widget_ops
            );
        }

        function widget($args, $instance)
        {
            extract($args);
            $title = apply_filters('widget_title', $instance['title']);
            echo ent2ncr($before_widget);
            if ($title) {
                echo htmlspecialchars_decode(esc_html($before_title . $title . $after_title));
            }
            echo '<div class="zoo-widget-language-switcher clearfix">';
            echo zoo_language_selector();
            echo '</div>';
            echo ent2ncr($after_widget);
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance = $new_instance;
            /* Strip tags (if needed) and update the widget settings. */
            $instance['title'] = strip_tags($new_instance['title']);
            return $instance;
        }

        function form($instance)
        {
            if ($instance['mode'] == '') {
                $instance['mode'] = 'text';
            }
            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title', 'zoo-kodo'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" type="text"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                       value="<?php echo isset($instance['title']) ? esc_attr($instance['title']) : ''; ?>"/>
            </p>
            <?php
        }
    }
}

if ( function_exists( 'zoo_language_selector' ) ) {
    add_action( 'widgets_init', 'zoo_language_switcher_load_widgets' );

    function zoo_language_switcher_load_widgets()
    {
        register_widget('ZooLanguageSwitcherWidget');
    }
}
