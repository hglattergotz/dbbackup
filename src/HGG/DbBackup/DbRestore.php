<?php

/**
 * This file is part of the HGG package.
 *
 * (c) 2013 Henning Glatter-Götz <henning@glatter-gotz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HGG\DbBackup;

use Symfony\Component\Process\Process;

/**
 * DbRestore
 *
 * @author Henning Glatter-Götz <henning@glatter-gotz.com>
 */
class DbRestore
{
    /**
     * cmdBuilder
     *
     * @var mixed
     * @access protected
     */
    protected $cmdBuilder;

    protected $timeout;

    /**
     * __construct
     *
     * @param mixed $cmdBuilder
     * @param int $timeout
     * @access public
     * @return void
     */
    public function __construct($cmdBuilder, $timeout = 3600)
    {
        $this->cmdBuilder = $cmdBuilder;
        $this->timeout = $timeout;
    }

    /**
     * Restore the database from a backup file
     *
     * @param mixed $username
     * @param mixed $password
     * @param mixed $host
     * @param mixed $database
     * @param mixed $backupFile
     * @param array $options
     * @param mixed $output
     * @access public
     * @return void
     */
    public function restore($username, $password, $host, $database, $backupFile, array $options, &$output)
    {
        $cmd = $this->cmdBuilder->load($username, $password, $host, $database, $backupFile, $options);

        $proc = new Process($cmd, null, null, null, $this->timeout);
        $proc->run();

        if (!$proc->isSuccessful()) {
            throw new \Exception($proc->getErrorOutput());
        }

        $output = $proc->getOutput();

        return true;
    }
}
