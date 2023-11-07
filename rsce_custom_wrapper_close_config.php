<?php


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// CHANGE THIS!
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

/*
 * Name of the element. Will be used for:
 *  - rsce_<ELEMENT_NAME>_open.html
 *  - rsce_<ELEMENT_NAME>_open_config.php
 *  - rsce_<ELEMENT_NAME>_close.html
 *  - rsce_<ELEMENT_NAME>_close_config.php
 */
const ELEMENT_NAME = "custom_wrapper";

const ELEMENT_LABEL = "Custom Wrapper";

const CONTENT_CATEGORY = "Container";

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++




return array(
    'label' => array(ELEMENT_LABEL . ' End', 'Container Element'),
    'types' => array('content', 'module'),
    'contentCategory' => CONTENT_CATEGORY,
    'moduleCategory' => 'miscellaneous',
    'wrapper' => array(
        'type' => 'stop',
    ),
    'fields' => array(

    ),
);