<?php

$cryco_temp_meta = 'cryco_temp_meta';

CSF::createMetabox( $cryco_temp_meta, array(
    'title'     => 'Template Type',
    'post_type' => array('cryco_template'),
    'data_type' => 'unserialize'
) );

// Header Section
CSF::createSection( $cryco_temp_meta, array(
    'fields' => array(
        array(
            'id'          => 'cryco_template_type',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => 'Select Template Type',
            'placeholder' => 'Select Template Type',
            'options'     => array(
                'tf_header_key'  => 'Header',
                'tf_footer_key'  => 'Footer',
            ),
            'default'     => ''
        ),
    ),
) );
