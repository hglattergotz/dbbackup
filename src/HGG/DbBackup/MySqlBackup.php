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
 * MySqlBackup
 *
 * @author Henning Glatter-Götz <henning@glatter-gotz.com>
 */
class MySqlBackup
{
    public function backupDb()
    {
        throw new Exception('Not implemented');
    }

    /**
     * backupTables
     *
     * @param mixed $username
     * @param mixed $password
     * @param mixed $database
     * @param array $tables
     * @param mixed $backupFile
     * @param array $options
     * @access public
     * @return void
     */
    public function backupTables($username, $password, $database, array $tables, $backupFile, array $options)
    {
        $cmd = $this->makeCmd($username, $password, $database, $tables, $backupFile, $options);

        $proc = new Process($cmd);
        $proc->run();

        if (!$proc->isSuccessful()) {
            throw new \Exception($proc->getErrorOutput());
        }

        return $proc->getOutput();
    }

    public function pruneFiles()
    {
        throw new Exception('Not implemented');
    }

    /**
     * makeCmd
     *
     * @param mixed $username
     * @param mixed $password
     * @param mixed $database
     * @param array $tables
     * @param mixed $targetFile
     * @param array $options
     * @access protected
     * @return void
     */
    protected function makeCmd($username, $password, $database, array $tables, $targetFile, array $options)
    {
        $components = array('mysqldump');

        $components[] = '-u '.$username;
        $components[] = '-p'.$password;
        $components = array_merge($components, $options);
        $components[] = $database;
        $components = array_merge($components, $tables);
        $components[] = '> '.$targetFile;

        return implode(' ', $components);
    }

    /**
     * makeOptionsString
     *
     * @param mixed $options
     * @access protected
     * @return void
     */
    protected function makeOptionsString($options)
    {
        $optionsString = '';

        if (is_array($options) && count($options) > 0) {
            foreach ($options as &$option) {
                $option = '--'.$option;
            }

            $optionsString = implode(' ', $options);
        }

        return $optionsString;
    }
}

