<?php

if( ! class_exists('acf_field_reusable_field_group') ) :

class acf_field_reusable_field_group extends acf_field {


    /*
    *  __construct
    *
    *  This function will setup the field type data
    *
    *  @type    function
    *  @date    5/03/2014
    *  @since   5.0.0
    *
    *  @param   n/a
    *  @return  n/a
    */

    function __construct() {
        /*
        *  name (string) Single word, no spaces. Underscores allowed
        */

        $this->name = 'reusable_field_group';


        /*
        *  label (string) Multiple words, can include spaces, visible when selecting a field type
        */

        $this->label = __('Reusable Field Group', 'acf-reusable_field_group');


        /*
        *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
        */

        $this->category = 'relational';


        /*
        *  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
        */

        $this->defaults = array(
            'group_key' => 0,
        );


        /*
        *  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
        *  var message = acf._e('reusable_field_group', 'error');
        */

        $this->l10n = array(
            'error' => __('Error! Please select a field group', 'acf-reusable_field_group'),
        );

        add_filter("acf/get_field_types", array($this, 'get_field_types'), 10, 1);
        add_filter("acf/prepare_field_for_export", array($this, 'prepare_fields_for_export'), 10, 1);


        // do not delete!
        parent::__construct();

    }


    /*
    *  render_field_settings()
    *
    *  Create extra settings for your field. These are visible when editing a field
    *
    *  @type    action
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $field (array) the $field being edited
    *  @return  n/a
    */

    function render_field_settings( $field ) {
        acf_render_field_setting( $field, array(
            'label'         => __('Field Group','acf'),
            'instructions'  => '',
            'type'          => 'select',
            'name'          => 'group_key',
            'choices'       => $this->pretty_field_groups($field),
            'multiple'      => 0,
            'ui'            => 1,
            'allow_null'    => 0,
            'placeholder'   => __("No Field Group",'acf'),
        ));
    }


    function pretty_field_groups($field) {
        global $post;

        $groups = acf_get_field_groups();
        $r      = array();

        $current_id = is_object( $post ) ? $post->ID : $_POST['parent'];
        $current_group = _acf_get_field_group_by_id($current_id);

        foreach( $groups as $group ) {
            $key = $group["key"];

            // don't show the current field group.
            if ($key == $current_group["key"]) {
                continue;
            }

            $r[$key] = $group["title"];
        }

        return $r;
    }


    function prepare_fields_for_export( $field ) {
        if ($field['type'] == $this->name) {
            unset($field['sub_fields']);
        }

        return $field;
    }


    /*
    *  render_field()
    *
    *  Create the HTML interface for your field
    *
    *  @param   $field (array) the $field being rendered
    *
    *  @type    action
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $field (array) the $field being edited
    *  @return  n/a
    */

    function render_field( $field ) {
        global $post, $self;

        if (is_object($post)) {
            $current_id = $post->ID;
        } elseif ($self === "profile.php") {
            $current_id = "user_" . $_GET["user_id"];
        } elseif ($self === "comment.php") {
            $current_id = "comment_" . $_GET["c"];
        } else {
            $current_id = "options";
        }

        $name_prefix = '';

        if (isset($field['parent'])) {
            preg_match_all('/\[(field_\w+)\](\[(\d+)\])?/', $field['prefix'], $parent_fields);


            if (isset($parent_fields[0])) {
                foreach ($parent_fields[0] as $parent_field_index => $parent_field) {
                    $field_name = $parent_fields[1][$parent_field_index];
                    $index = $parent_fields[3][$parent_field_index];
                    $parent_field_object = acf_get_field($field_name);
                    $parent_prefix = $parent_field_object['name'];

                    if ($index !== '') {
                        $parent_prefix .= '_' . $index;
                    }

                    $name_prefix .= $parent_prefix . '_';
                }
            }

            $name_prefix .= $field['_name'] . '_';
        }

        foreach ( $field['sub_fields'] as $sub_field ) {
            $sub_name_prefix = $name_prefix;
            $sub_field_name = $sub_field['name'];

            // update prefix to allow for nested values
            $sub_field['prefix'] = $field["name"];

            $sub_field['name'] = "{$name_prefix}{$sub_field_name}";

            // load value
            if( $sub_field['value'] === null ) {
                $sub_field['value'] = acf_get_value( $current_id, $sub_field );
            }

            // render input
            acf_render_field_wrap( $sub_field );
        }
    }


    /*
    *  input_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
    *  Use this action to add CSS + JavaScript to assist your render_field() action.
    *
    *  @type    action (admin_enqueue_scripts)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*

    function input_admin_enqueue_scripts() {

        $dir = plugin_dir_url( __FILE__ );


        // register & include JS
        wp_register_script( 'acf-input-reusable_field_group', "{$dir}js/input.js" );
        wp_enqueue_script('acf-input-reusable_field_group');


        // register & include CSS
        wp_register_style( 'acf-input-reusable_field_group', "{$dir}css/input.css" );
        wp_enqueue_style('acf-input-reusable_field_group');


    }

    */


    /*
    *  input_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your render_field() action.
    *
    *  @type    action (admin_head)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*

    function input_admin_head() {



    }

    */


    /*
    *  input_form_data()
    *
    *  This function is called once on the 'input' page between the head and footer
    *  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and
    *  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
    *  seen on comments / user edit forms on the front end. This function will always be called, and includes
    *  $args that related to the current screen such as $args['post_id']
    *
    *  @type    function
    *  @date    6/03/2014
    *  @since   5.0.0
    *
    *  @param   $args (array)
    *  @return  n/a
    */

    /*

    function input_form_data( $args ) {



    }

    */


    /*
    *  input_admin_footer()
    *
    *  This action is called in the admin_footer action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your render_field() action.
    *
    *  @type    action (admin_footer)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*

    function input_admin_footer() {



    }

    */


    /*
    *  field_group_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
    *  Use this action to add CSS + JavaScript to assist your render_field_options() action.
    *
    *  @type    action (admin_enqueue_scripts)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */

    /*

    function field_group_admin_enqueue_scripts() {

    }

    */


    /*
    *  field_group_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is edited.
    *  Use this action to add CSS and JavaScript to assist your render_field_options() action.
    *
    *  @type    action (admin_head)
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   n/a
    *  @return  n/a
    */



    function field_group_admin_head() {
        ?>
        <style type="text/css">

        .acf-field-list .acf-field-object-reusable-field-group tr[data-name="instructions"],
        .acf-field-list .acf-field-object-reusable-field-group tr[data-name="required"],
        .acf-field-list .acf-field-object-reusable-field-group tr[data-name="warning"],
        .acf-field-list .acf-field-object-reusable-field_group tr[data-name="instructions"],
        .acf-field-list .acf-field-object-reusable-field_group tr[data-name="required"],
        .acf-field-list .acf-field-object-reusable-field_group tr[data-name="warning"] {
            display: none !important;
        }

        </style>
            <?php
    }




    /*
    *  load_value()
    *
    *  This filter is applied to the $value after it is loaded from the db
    *
    *  @type    filter
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $value (mixed) the value found in the database
    *  @param   $post_id (mixed) the $post_id from which the value was loaded
    *  @param   $field (array) the field array holding all the field options
    *  @return  $value
    */



    function load_value( $value, $post_id, $field ) {
        $fields = array();

        foreach( $field['sub_fields'] as $sub_field ) {

            $sub_field_name = $sub_field['name'];

            // update prefix to allow for nested values
            $sub_field['prefix'] = $field["name"];

            $sub_field['name'] = "{$field['name']}_{$sub_field_name}";

            // load value
            if( $sub_field['value'] === null ) {
                $sub_field['value'] = acf_format_value(acf_get_value( $post_id, $sub_field ), $post_id, $sub_field);
            }

            $fields[$sub_field_name] = $sub_field['value'];
        }

        return $fields;

    }




    /*
    *  update_value()
    *
    *  This filter is applied to the $value before it is saved in the db
    *
    *  @type    filter
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $value (mixed) the value found in the database
    *  @param   $post_id (mixed) the $post_id from which the value was loaded
    *  @param   $field (array) the field array holding all the field options
    *  @return  $value
    */



    function update_value( $value, $post_id, $field ) {
        if (! empty($value)) {
            foreach ($value as $field_key => $field_value) {
                foreach ( $field['sub_fields'] as $sub_field ) {
                    if ($field_key == $sub_field['key']) {
                        // update field
                        $sub_field_name = $sub_field['name'];

                        $sub_field['name'] = "{$field['name']}_{$sub_field_name}";

                        acf_update_value( $field_value, $post_id, $sub_field );

                        break;
                    }
                }
            }
        }

        return null;
    }



    /*
    *  format_value()
    *
    *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
    *
    *  @type    filter
    *  @since   3.6
    *  @date    23/01/13
    *
    *  @param   $value (mixed) the value which was loaded from the database
    *  @param   $post_id (mixed) the $post_id from which the value was loaded
    *  @param   $field (array) the field array holding all the field options
    *
    *  @return  $value (mixed) the modified value
    */

    /*

    function format_value( $value, $post_id, $field ) {

        // bail early if no value
        if( empty($value) ) {

            return $value;

        }


        // apply setting
        if( $field['font_size'] > 12 ) {

            // format the value
            // $value = 'something';

        }


        // return
        return $value;
    }

    */


    /*
    *  validate_value()
    *
    *  This filter is used to perform validation on the value prior to saving.
    *  All values are validated regardless of the field's required setting. This allows you to validate and return
    *  messages to the user if the value is not correct
    *
    *  @type    filter
    *  @date    11/02/2014
    *  @since   5.0.0
    *
    *  @param   $valid (boolean) validation status based on the value and the field's required setting
    *  @param   $value (mixed) the $_POST value
    *  @param   $field (array) the field array holding all the field options
    *  @param   $input (string) the corresponding input name for $_POST value
    *  @return  $valid
    */

    /*

    function validate_value( $valid, $value, $field, $input ){

        // Basic usage
        if( $value < $field['custom_minimum_setting'] )
        {
            $valid = false;
        }


        // Advanced usage
        if( $value < $field['custom_minimum_setting'] )
        {
            $valid = __('The value is too little!','acf-reusable_field_group'),
        }


        // return
        return $valid;

    }

    */


    /*
    *  delete_value()
    *
    *  This action is fired after a value has been deleted from the db.
    *  Please note that saving a blank value is treated as an update, not a delete
    *
    *  @type    action
    *  @date    6/03/2014
    *  @since   5.0.0
    *
    *  @param   $post_id (mixed) the $post_id from which the value was deleted
    *  @param   $key (string) the $meta_key which the value was deleted
    *  @return  n/a
    */

    /*

    function delete_value( $post_id, $key ) {



    }

    */


    /*
    *  load_field()
    *
    *  This filter is applied to the $field after it is loaded from the database
    *
    *  @type    filter
    *  @date    23/01/2013
    *  @since   3.6.0
    *
    *  @param   $field (array) the field array holding all the field options
    *  @return  $field
    */



    function load_field( $field ) {

        $group  = _acf_get_field_group_by_key($field["group_key"]);
        $fields = acf_get_fields($group);
        $field['sub_fields'] = $fields;

        return $field;

    }




    /*
    *  update_field()
    *
    *  This filter is applied to the $field before it is saved to the database
    *
    *  @type    filter
    *  @date    23/01/2013
    *  @since   3.6.0
    *
    *  @param   $field (array) the field array holding all the field options
    *  @return  $field
    */



    function update_field( $field ) {

        // remove sub fields
        unset($field['sub_fields']);

        return $field;

    }




    /*
    *  delete_field()
    *
    *  This action is fired after a field is deleted from the database
    *
    *  @type    action
    *  @date    11/02/2014
    *  @since   5.0.0
    *
    *  @param   $field (array) the field array holding all the field options
    *  @return  n/a
    */



    function delete_field( $field ) {

        // loop through sub fields
        if( !empty($field['sub_fields']) ) {

            foreach( $field['sub_fields'] as $sub_field ) {

                acf_delete_field( $sub_field['ID'] );

            }

        }

    }

    function get_field_types($types)
    {
        return $types;
    }


}


// create field
new acf_field_reusable_field_group();

endif;

?>
