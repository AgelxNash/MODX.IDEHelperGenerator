<?php
return array(
    'DocumentParser' => array(
        'var' => array(
            'old' => array(
                'desc' => 'deprecated functions',
                'type' => '\OldFunctions',
                'name' => 'old',
                'default' => 'null'
            ),
            'db' => array(
                'type' => '\DBAPI'
            ),
            'event' => array(
                'type' => '\SystemEvent'
            ),
            'Event' => array(
                'type' => '\SystemEvent'
            )
        ),
        'function' => array(
            'getDocumentChildrenTVarOutput' => array(
                'param' => array(
                    5 => array(
                        'name' => '$tvidnames'
                    )
                )
            ),
            'getDocumentChildrenTVars' => array(
                'param' => array(
                    8 => array(
                        'name' => '$tvidnames'
                    )
                )
            ),
            'getLoginUserID' => array(
                'param' => array(
                    1 => array(
                        'name' => '$context'
                    )
                )
            ),
            'getLoginUserName' => array(
                'param' => array(
                    1 => array(
                        'name' => '$context'
                    )
                )
            ),
        ),
        'parent' => 'OldFunctions'
    ),
    'DBAPI' => array(
        'function' => array(
            'getHTMLGrid' => array(
                'param' => array(
                    2 => array(
                        'name' => '$params'
                    )
                )
            ),
            'getTableMetaData' => array(
                'param' => array(
                    1 => array(
                        'name' => '$table'
                    )
                )
            ),
            'prepareDate' => array(
                'param' => array(
                    0 => array(
                        'name' => '$timestamp'
                    ),
                    1 => array(
                        'name' => '$fieldType'
                    ),
                    2 => array(
                        'name' => null
                    ),
                    3 => array(
                        'name' => null
                    )
                )
            )
        )
    ),
    'MagpieRSS' => array(
        'var' => array(
            '_KNOWN_ENCODINGS' => array(
                'default' => "array('UTF-8', 'US-ASCII', 'ISO-8859-1')"
            ),
            '_CONTENT_CONSTRUCTS' => array(
                'default' => "array('content', 'summary', 'info', 'title', 'tagline', 'copyright')"
            )
        )
    )
);