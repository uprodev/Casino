<?php 
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'my_title_with_id',
            'title'             => __('Title with id (Casino)'),
            'description'       => __('Add Title with id'),
            'render_template'   => 'parts/blocks/title_with_id.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_fancybox_image',
            'title'             => __('Fancybox image (Casino)'),
            'description'       => __('Add Fancybox image'),
            'render_template'   => 'parts/blocks/fancybox_image.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_list',
            'title'             => __('List (Casino)'),
            'description'       => __('Add List'),
            'render_template'   => 'parts/blocks/list.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_button',
            'title'             => __('Button (Casino)'),
            'description'       => __('Add Button'),
            'render_template'   => 'parts/blocks/button.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_note_start',
            'title'             => __('Note (Start) (Casino)'),
            'description'       => __('Add Note (Start)'),
            'render_template'   => 'parts/blocks/note_start.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_note_end',
            'title'             => __('Note (End) (Casino)'),
            'description'       => __('Add Note (End)'),
            'render_template'   => 'parts/blocks/note_end.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_table',
            'title'             => __('Table (Casino)'),
            'description'       => __('Add Table'),
            'render_template'   => 'parts/blocks/table.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_numbered_list',
            'title'             => __('Numbered List (Casino)'),
            'description'       => __('Add Numbered List'),
            'render_template'   => 'parts/blocks/numbered_list.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_tabs',
            'title'             => __('Tabs (Casino)'),
            'description'       => __('Add Tabs'),
            'render_template'   => 'parts/blocks/tabs.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_faq',
            'title'             => __('FAQ (Casino)'),
            'description'       => __('Add FAQ'),
            'render_template'   => 'parts/blocks/faq.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_toggle',
            'title'             => __('Toggle (Casino)'),
            'description'       => __('Add Toggle'),
            'render_template'   => 'parts/blocks/toggle.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_authors_list',
            'title'             => __('Authors List (Casino)'),
            'description'       => __('Add Authors List'),
            'render_template'   => 'parts/blocks/authors_list.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_author',
            'title'             => __('Author (Casino)'),
            'description'       => __('Add Author'),
            'render_template'   => 'parts/blocks/author.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
        acf_register_block_type(array(
            'name'              => 'my_form',
            'title'             => __('Form (Casino)'),
            'description'       => __('Add Form'),
            'render_template'   => 'parts/blocks/form.php',
            'category'          => 'common',
            'post_types'        => array('page', 'post'),
        ));
    }
}