<?php

namespace MBence\OpenTBSBundle\Services;

require_once __DIR__ . '/../lib/tbs_class.php';
require_once __DIR__ . '/../lib/tbs_plugin_opentbs.php';

/**
 * Service for OpenTBS Bundle
 */
class OpenTBS extends \clsTinyButStrong
{
    public function __construct()
    {
        // construct the TBS class
        parent::__construct();

        // load the OpenTBS plugin
        $this->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);
    }
}