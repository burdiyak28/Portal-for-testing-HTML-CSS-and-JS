<?php
/**
 * Created by PhpStorm.
 * User: fuckyou
 * Date: 04/03/18
 * Time: 09:36
 */

namespace App\Core;

use Delight\Db\PdoDataSource;
use Delight\Db\PdoDatabase;

class SQL
{
    protected static $db = null;

    private static $instance = null;

    final protected function __construct()
    {
        $dataSource = new PdoDataSource(SQL_TYPE);
        $dataSource->setHostname(SQL_HOST)
            ->setPort(SQL_PORT)
            ->setDatabaseName(SQL_DB_NAME)
            ->setCharset(SQL_CHARSET)
            ->setUsername(SQL_USERNAME)
            ->setPassword(SQL_PASSWORD);

        self::$db = PdoDatabase::fromDataSource($dataSource);
    }

    private function __clone() {}

    private function __wakeup() {}

    private function __sleep() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @return null|static
     */
    public function getDb()
    {
        return self::$db;
    }




}