<?php

/*
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
 * DbBackup
 *
 * @author Henning Glatter-Götz <henning@glatter-gotz.com>
 */
class DbBackup
{
    protected $cmdBuilder;

    /**
     * __construct
     *
     * @param mixed $cmdBuilder
     * @access public
     * @return void
     */
    public function __construct($cmdBuilder)
    {
        $this->cmdBuilder = $cmdBuilder;
    }

    /**
     * backupDb
     *
     * Backup an entire database to a file
     *
     * @param string $username   The username for database access
     * @param string $password   The password for database access
     * @param string $host       The host
     * @param string $database   The name of the database
     * @param string $backupFile The target file
     * @param array $options     Any options to be passed on to the cmd builder
     * @param mixed $output      The output from the process
     * @access public
     * @throws \Exception
     * @return boolean
     */
    public function backupDb($username, $password, $host, $database, $backupFile, array $options, &$output)
    {
        return $this->backupTables($username, $password, $host, $database, array(), $backupFile, $options, $output);
    }

    /**
     * backupTables
     *
     * Backup specific files in a database to a file
     *
     * @param mixed $username   The username for database access
     * @param mixed $password   The password for database access
     * @param string $host      The host
     * @param mixed $database   The name of the database
     * @param array $tables     The list of tables
     * @param mixed $backupFile The target file
     * @param array $options    Any options to be passed on to the cmd builder
     * @param mixed $output     The output from the process
     * @access public
     * @throws \Exception
     * @return boolean
     */
    public function backupTables($username, $password, $host, $database, array $tables, $backupFile, array $options, &$output)
    {
        $cmd = $this->cmdBuilder->make($username, $password, $host, $database, $tables, $backupFile, $options);

        $proc = new Process($cmd);
        $proc->run();

        if (!$proc->isSuccessful()) {
            throw new \Exception($proc->getErrorOutput());
        }

        $output = $proc->getOutput();

        return true;
    }
}


