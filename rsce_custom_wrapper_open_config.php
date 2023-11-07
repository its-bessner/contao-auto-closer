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


$GLOBALS["TL_DCA"]["tl_content"]["config"]["onsubmit_callback"][] = [function (DataContainer $dc): void
{

    if ($dc->activeRecord && $dc->activeRecord->type == 'rsce_' . ELEMENT_NAME . "_open") {
        $typeArray = implode(",", array_fill(0, count(self::WRAPPER_START_NAMES), "?"));

        $entry = ContentModel::findById($dc->id);
        if ($entry) {
            $wrappersStart = ContentModel::findBy(
                ['type=?', 'pid=?'],
                ['rsce_' . ELEMENT_NAME . '_open', $entry->pid]
            );
            $wrappersStop = ContentModel::findBy(['type=?', 'pid=?'], ['rsce_' . ELEMENT_NAME . '_close',  $entry->pid]);
            $noeStart = $wrappersStart ? $wrappersStart->count() : 0;
            $noeStop = $wrappersStop ? $wrappersStop->count() : 0;
            if ($noeStop < $noeStart) {
                $entryNew = new ContentModel();
                $entryNew->type = 'rsce_' . ELEMENT_NAME . '_close';
                $entryNew->sorting = $entry->sorting + 1;
                $entryNew->tstamp = time();
                $entryNew->pid = $entry->pid;
                $entryNew->ptable = $entry->ptable;
                $entryNew->save();
            }
        }
    }
}];


return array(
    'label' => array(ELEMENT_LABEL . ' Start', 'Container Element'),
    'types' => array('content', 'module'),
    'contentCategory' => CONTENT_CATEGORY,
    'moduleCategory' => 'miscellaneous',
    'standardFields' => array('headline', 'cssID'),
    'wrapper' => array(
        'type' => 'start',
    ),
    'fields' => array(),
);