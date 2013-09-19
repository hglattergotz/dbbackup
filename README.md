[![Build Status](https://travis-ci.org/hglattergotz/dbbackup.png)](https://travis-ci.org/hglattergotz/dbbackup)

Programmatically create dump files of an entire database or individual tables
in a PHP application.

## Installation

Using Composer:

```json
{
    "require": {
        "hglattergotz/dbbackup": "dev-master"
    }
}
```

## Supported Databases:

 - MySql

## Usage

### Backup entire database

```php
use HGG\DbBackup\CmdBuilder\MySql;
use HGG\DbBackup\DbBackup;

try
{
    $output = '';
    $backup = new DbBackup(new MySql());
    $backup->backupDb('username',
                      'password',
                      'localhost',
                      'database',
                      'backupFile',
                      array(),
                      &$output);
    // log $output
}
catch (\Exception $e)
{
    // deal with failure
}
```

### Backup specific tables in a database

```php
use HGG\DbBackup\CmdBuilder\MySql;
use HGG\DbBackup\DbBackup;

try
{
    $output = '';
    $backup = new DbBackup(new MySql());
    $backup->backupTables('username',
                          'password',
                          'localhost',
                          'database',
                          array('table1', 'table2'),
                          'backupFile',
                          array(),
                          &$output);
    // log $output
}
catch (\Exception $e)
{
    // deal with failure
}
```

### Restore form a dump file

```php
use HGG\DbBackup\CmdBuilder\MySql;
use HGG\DbBackup\DbRestore;

try
{
    $output = '';
    $restore = new DbRestore(new MySql());
    $restore->restore('username',
                      'password',
                      'localhost',
                      'database',
                      'backupFile',
                      array(),
                      &$output);
    // log $output
}
catch (\Exception $e)
{
    // deal with failure
}
```
