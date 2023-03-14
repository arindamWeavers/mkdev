<?php
if( function_exists('acf_add_local_field_group') ):

$fields = array (
    array (
       'key' => 'field_59f1ff5e12044',
       'label' => 'Options',
       'name' => 'options',
       'type' => 'repeater',
       'instructions' => '',
       'required' => 0,
       'conditional_logic' => 0,
       'wrapper' => array (
           'width' => '',
           'class' => '',
           'id' => '',
       ),
       'collapsed' => '',
       'min' => 0,
       'max' => 0,
       'layout' => 'table',
       'button_label' => '',
       'sub_fields' => array (
            array (
                'key' => 'field_59f1ff6a12045',
                'label' => 'Bond Detail',
                'name' => 'bond_detail',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => 40,
                'readonly' => 0,
                'disabled' => 0,
           ),
           array (
               'key' => 'field_59f1ba8d12046',
               'label' => 'URL Link Type',
               'name' => 'url_link_type',
               'type' => 'true_false',
               'instructions' => '',
               'required' => 0,
               'conditional_logic' => 0,
               'wrapper' => array (
                   'width' => '',
                   'class' => '',
                   'id' => '',
               ),
               'message' => '',
               'default_value' => 0,
               'ui' => 1,
               'ui_on_text' => 'External',
               'ui_off_text' => 'Internal',
           ),
           array (
               'key' => 'field_59f1ffba12047',
               'label' => 'URL Link',
               'name' => 'url_link',
               'type' => 'url',
               'instructions' => '',
               'required' => 0,
               'conditional_logic' => array (
                   array (
                       array (
                           'field' => 'field_59f1ba8d12046',
                           'operator' => '==',
                           'value' => '1',
                       ),
                   ),
               ),
               'wrapper' => array (
                   'width' => '',
                   'class' => '',
                   'id' => '',
               ),
               'default_value' => '',
               'placeholder' => '',
           ),
           array (
               'key' => 'field_59f1ffd812048',
               'label' => 'Page Link',
               'name' => 'page_link',
               'type' => 'page_link',
               'instructions' => '',
               'required' => 0,
               'conditional_logic' => array (
                   array (
                       array (
                           'field' => 'field_59f1ba8d12046',
                           'operator' => '!=',
                           'value' => '1',
                       ),
                   ),
               ),
               'wrapper' => array (
                   'width' => '',
                   'class' => '',
                   'id' => '',
               ),
               'post_type' => array (
               ),
               'taxonomy' => array (
               ),
               'allow_null' => 0,
               'allow_archives' => 1,
               'multiple' => 0,
           ),
       ),
    )
);

$bond_classification_items = get_field('bond_classification_items', 'option');
if(is_array($bond_classification_items)) {
    foreach($bond_classification_items as $index => $item) {
        $index = (string)$index;
        if(strlen($index) == 1) {
            $index = '00' . $index;
        } elseif(strlen($index) == 2) {
            $index = '0' . $index;
        }
        $fields[] = array(
            'key'   => 'field_59f1ff8d11' . $index,
            'label' => '',
            'name'  => 'option_' . $item['identifier'],
            'type'  => 'group',
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id'    => '',
            ),
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key'               => 'field_59f1ff8d12' . $index,
                    'label'             => '',
                    'type'              => 'message',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '20%',
                        'class' => '',
                        'id'    => '',
                    ),
                    'message'           => $item['title'],
                ),
                array(
                    'key'               => 'field_59f1ff8d13' . $index,
                    'label'             => 'Use Default Url Link',
                    'name'              => 'use_default',
                    'type'              => 'true_false',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '15%',
                        'class' => '',
                        'id'    => '',
                    ),
                    'message'           => '',
                    'default_value'     => 1,
                    'ui'                => 1,
                    'ui_on_text'        => 'Yes',
                    'ui_off_text'       => 'No',
                ),
                array(
                    'key'               => 'field_59f1ff8d14' . $index,
                    'label'             => 'URL Link Type',
                    'name'              => 'url_link_type',
                    'type'              => 'true_false',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_59f1ff8d13' . $index,
                                'operator' => '!=',
                                'value'    => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array (
                        'width' => '15%',
                        'class' => '',
                        'id'    => '',
                    ),
                    'message'           => '',
                    'default_value'     => 1,
                    'ui'                => 1,
                    'ui_on_text'        => 'External',
                    'ui_off_text'       => 'Internal',
                ),
                array(
                    'key'               => 'field_59f1ffba15' . $index,
                    'label'             => 'URL Link',
                    'name'              => 'url_link',
                    'type'              => 'url',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_59f1ff8d14' . $index,
                                'operator' => '==',
                                'value'    => '1',
                            ),
                            array(
                                'field'    => 'field_59f1ff8d13' . $index,
                                'operator' => '!=',
                                'value'    => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array (
                        'width' => '50%',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value' => '',
                    'placeholder'   => '',
                ),
                array(
                    'key'          => 'field_59f1ffd816' . $index,
                    'label'        => 'Page Link',
                    'name'         => 'page_link',
                    'type'         => 'page_link',
                    'instructions' => '',
                    'required'     => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_59f1ff8d14' . $index,
                                'operator' => '!=',
                                'value'    => '1',
                            ),
                            array(
                                'field'    => 'field_59f1ff8d13' . $index,
                                'operator' => '!=',
                                'value'    => '1',
                            ),
                        ),
                    ),
                    'wrapper' => array (
                        'width' => '50%',
                        'class' => '',
                        'id'    => '',
                    ),
                    'post_type'      => array (),
                    'taxonomy'       => array (),
                    'allow_null'     => 0,
                    'allow_archives' => 1,
                    'multiple'       => 0,
                ),
            ),
        );
    }
}

acf_add_local_field_group(array (
	'key' => 'group_59f1ff4b2a1f7',
	'title' => 'Bond Classification Dropdown',
	'fields' => $fields,
	'location' => array (),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
