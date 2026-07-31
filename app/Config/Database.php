<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    public string $defaultGroup = 'default';

    /**
     * @var array<string, mixed>
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => '',
        'database'     => 'technova_inventory',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
    ];

    /**
     * Koneksi khusus buat PHPUnit database test (Fase 4).
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => '',
        'database'     => 'technova_inventory_test',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => 'db_',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
    ];

    public function __construct()
    {
        parent::__construct();

        // Override pakai environment variable kalau ada (jalan di Docker).
        // Kalau gak ada (jalan lokal tanpa Docker), fallback ke nilai default di atas.
        if (getenv('DB_HOST')) {
            $this->default['hostname'] = getenv('DB_HOST');
            $this->tests['hostname']   = getenv('DB_HOST');
        }
        if (getenv('DB_USER')) {
            $this->default['username'] = getenv('DB_USER');
            $this->tests['username']   = getenv('DB_USER');
        }
        if (getenv('DB_PASS') !== false) {
            $this->default['password'] = getenv('DB_PASS');
            $this->tests['password']   = getenv('DB_PASS');
        }
        if (getenv('DB_NAME')) {
            $this->default['database'] = getenv('DB_NAME');
        }
        if (getenv('DB_TEST_NAME')) {
            $this->tests['database'] = getenv('DB_TEST_NAME');
        }

        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}