<?php

return array(
    'DocumentParser' => array(
        'var' => array(
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
        )
    ),
    'DBAPI' => array(
        'function' => array(
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
    'DBAPI_abstract' => array(
        'function' => array(
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
    'HashHandler' => array(
        'function' => array(
            'check' => array(
                'param' => array(
                    3 => array(
                        'name' => null
                    )
                )
            )
        )
    ),
    'ImageEditor' => array(
        'function' => array(
            'processAction' => array(
                'param' => array(
                    3 => array(
                        'name' => null
                    )
                )
            )
        )
    ),
    'errorHandler' => array(
        'var' => array(
            'errors'=> array(
                'default' => 'array(
                    0	=> 	"No errors occured.",
                    1	=>	"An error occured!",
                    2	=>	"Document\'s ID not passed in request!",
                    3	=>	"You don\'t have enough privileges for this action!",
                    4	=>	"ID passed in request is NaN!",
                    5	=>	"The document is locked!",
                    6	=>	"Too many results returned from database!",
                    7	=>	"Not enough/ no results returned from database!",
                    8	=>	"Couldn\'t find parent document\'s name!",
                    9	=>	"Logging error!",
                    10	=>	"Table to optimise not found in request!",
                    11	=>	"No settings found in request!",
                    12	=>	"The document must have a title!",
                    13	=>	"No user selected as recipient of this message!",
                    14	=>	"No group selected as recipient of this message!",
                    15	=>	"The document was not found!",



                    100 =>	"Double action (GET & POST) posted!",
                    600 =>	"Document cannot be it\'s own parent!",
                    601 =>	"Document\'s ID not passed in request!",
                    602 =>	"New parent not set in request!",
                    900 =>	"Incorrect username or password entered!",
                    901 =>	"Incorrect username or password entered!",
                    902 =>	"Due to too many failed logins, you have been blocked!",
                    903 =>	"You are blocked and cannot log in!",
                    904 =>	"You are blocked and cannot log in! Please try again later.",
                    905 =>	"The security code you entered didn\'t validate! Please try to login again!"
                )'
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