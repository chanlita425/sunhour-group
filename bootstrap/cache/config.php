<?php return array (
  2 => 'broadcasting',
  4 => 'concurrency',
  5 => 'cors',
  8 => 'hashing',
  14 => 'view',
  'app' => 
  array (
    'name' => 'Sunhour Group Co., Ltd',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://sunhourgroup.com.kh',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:8eWRAr+IQRTvQ4Hp1v/x5Tich+F0xMq/NSG6gy56mn8=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'Illuminate\\View\\ViewServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Uri' => 'Illuminate\\Support\\Uri',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'jwt',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'cache' => 
  array (
    'default' => 'database',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'E:\\sunhour\\storage\\framework/cache/data',
        'lock_path' => 'E:\\sunhour\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'laravel_cache_',
  ),
  'database' => 
  array (
    'default' => 'sqlite',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'database/database.sqlite',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'database/database.sqlite',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'database/database.sqlite',
        'username' => 'root',
        'password' => '',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '5432',
        'database' => 'database/database.sqlite',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '1433',
        'database' => 'database/database.sqlite',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'laravel_database_',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\sunhour\\storage\\app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\sunhour\\storage\\app/public',
        'url' => 'http://sunhourgroup.com.kh/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
      'customize' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\sunhour\\public\\../public',
        'url' => 'http://sunhourgroup.com.kh/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
    ),
    'links' => 
    array (
      'E:\\sunhour\\public\\storage' => 'E:\\sunhour\\storage\\app/public',
    ),
  ),
  'jwt' => 
  array (
    'secret' => 'zXXvFoDJljAAgbdLcpLKEW80CM6y7bOSCOtCe3zHNrTPoKspeuLK4AK2eToFxRYR',
    'keys' => 
    array (
      'public' => '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvWvQ9fb8U9/iMQD9ou6k
9YAylk6ACe4I14aG2LRESgfaP/LqjOZi4xIe3uxwFN2DSM0HuhE5w31Yozr9TMhd
9394zjjLf3cVb2Ysdk3I8034LjpSLDkt1Q2dQJpVZlN/0/mnI8HPSZmNyBZbxh74
IqjT7vl1fcn+s+RVb+T9I4JhE119AUQCosVIuBGpf47Ed4iWpTRcwKCiVjbBnGp2
KvylQWpzRu2M8OWtJ4YwpwrBS5uREytjXxTMc2edJHGSPmD/0/xpklpCVG6LfLoP
09u1Jvd6eqH/gQTi7RkLefX9+9R/LNOCXr/A9/LUET4UvY1EvWOeP5dAHSN4HyBH
VQIDAQAB
-----END PUBLIC KEY-----
',
      'private' => '-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC9a9D19vxT3+Ix
AP2i7qT1gDKWToAJ7gjXhobYtERKB9o/8uqM5mLjEh7e7HAU3YNIzQe6ETnDfVij
Ov1MyF33f3jOOMt/dxVvZix2TcjzTfguOlIsOS3VDZ1AmlVmU3/T+acjwc9JmY3I
FlvGHvgiqNPu+XV9yf6z5FVv5P0jgmETXX0BRAKixUi4Eal/jsR3iJalNFzAoKJW
NsGcanYq/KVBanNG7Yzw5a0nhjCnCsFLm5ETK2NfFMxzZ50kcZI+YP/T/GmSWkJU
bot8ug/T27Um93p6of+BBOLtGQt59f371H8s04Jev8D38tQRPhS9jUS9Y54/l0Ad
I3gfIEdVAgMBAAECggEACRWNnO4uZbtb9qusfk7hnGB8jJbRLyi6RdPOzb+/cqlz
vxNgSkeWQHuS/W/rZCTHcgtbLoI6+fQd9x4SHceSMhdr7L/uintkjMYipb3PQFPh
7h2f6T0IxKn1e66rH9ArVjgn2uAll8sEcK8Z0aOUlNzx5QkTqGeyjmAJ9ObPeQ9n
dsR/DYQXuMbSoROW2erdywfaGeZXoSZGSM1JbQVDCHcTQhx33yDuB8q7a1z/sXt5
GzMSdGWCGuc3jDQKGJSprPnpCxtdECioDAWAqmasqE0h4DlS9ySgi0piWz2JVGJh
wUIm8kK4p3/uRyLwY50yhD7/U/Ubpq3H3qiVEK6itQKBgQDuGboXJJQ/onrVkT2V
uSnid3Wwthr/Jg9sEbRRZk88GN3ZIoNVwqMvZJbc41OjtQKLgTSqeUHLceMjXa0G
6+Bykq2O79ZrPj7VNvLi4/2Drsa7Ud3n83ClgcoS9jM0AVfOxSxdA/3gPU6WbdIG
oycYkozgKqkyK6g5xTWqQ9ke6wKBgQDLqT/hLXlVTCidWfY2BkZH51d4E7dBdpLj
GZ6u50mRaIfkNwjWXI8D+Y2Dc1LM7TaB+U2ZBZfwWUDGDBHgsq5s1YTZeQHlmzyP
WcsZQEDRn9hxiUC8HIZ+P9N64P8LhlM9AgwOk+NS8UHHpxtiRvITwKqUEAupGha6
ZUACslUivwKBgQC52YUC2X+KKDY/C66Jds21ws8vjwWFkVzKWwtn2jcQzswj16ey
QkoEDT0gz6SSjRCeecz1H872kT/ddBpB483/QHSOtLCmZyC+ZrSx24ofxkXDI0TV
75RG7AciQ+B1wHKcqBVXyWzaIqB8FN6yZZl3ubSSqVoGGkOmTEP2Uh1g3wKBgFzw
MIF+sfb12TbtPckrldjsPmNChAcwqBlQsLRaQZ1EmXbQkozYEj+bGzQYZXm06oHn
lby16783y7JVAbeLcsOhsI1Zhj8UV0+Hh4JPawT+L9Sn8M2nKszkLYrOsDS/KK8X
hw8D9+H6zKzimkF/5KqU6oLEy71wdVy8JbjVTrqbAoGAOHw3U0ElEioWV2MEXoYP
4ID19kpEjVBLuwsrlTNWEC/GJ9tPRsPZOq8o40ngbftBjZCsioe9ekjgPwkQVaq4
JEsMb5tj/j+tH2XxcSziPnQFM1fEFiLKqjsEu5TJ+TsyReGCHwakbM6GU598Rhfg
r9d/L2L9Ds9l6tA4likDQYc=
-----END PRIVATE KEY-----
',
      'passphrase' => 'somtola',
    ),
    'ttl' => 60,
    'refresh_ttl' => '20160',
    'algo' => 'RS256',
    'required_claims' => 
    array (
      0 => 'iss',
      1 => 'iat',
      2 => 'exp',
      3 => 'nbf',
      4 => 'sub',
      5 => 'jti',
    ),
    'persistent_claims' => 
    array (
      0 => 'role',
      1 => 'status',
    ),
    'lock_subject' => true,
    'leeway' => '0',
    'blacklist_enabled' => true,
    'blacklist_grace_period' => '0',
    'decrypt_cookies' => true,
    'providers' => 
    array (
      'jwt' => 'Tymon\\JWTAuth\\Providers\\JWT\\Lcobucci',
      'auth' => 'Tymon\\JWTAuth\\Providers\\Auth\\Illuminate',
      'storage' => 'Tymon\\JWTAuth\\Providers\\Storage\\Illuminate',
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'E:\\sunhour\\storage\\logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'E:\\sunhour\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'E:\\sunhour\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => 'smtp.titan.email',
        'port' => '587',
        'username' => 'ssl@sunhourgroup.com.kh',
        'password' => 'wpmfghmytqmzhvrs',
        'timeout' => NULL,
        'local_domain' => 'sunhourgroup.com.kh',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'ssl@sunhourgroup.com.kh',
      'name' => 'Laravel',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'E:\\sunhour\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'sqlite',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'sqlite',
      'table' => 'failed_jobs',
    ),
  ),
  'scout' => 
  array (
    'driver' => 'algolia',
    'prefix' => '',
    'queue' => false,
    'after_commit' => false,
    'chunk' => 
    array (
      'searchable' => 500,
      'unsearchable' => 500,
    ),
    'soft_delete' => false,
    'identify' => false,
    'algolia' => 
    array (
      'id' => '',
      'secret' => '',
      'index-settings' => 
      array (
      ),
    ),
    'meilisearch' => 
    array (
      'host' => 'http://localhost:7700',
      'key' => NULL,
      'index-settings' => 
      array (
      ),
    ),
    'typesense' => 
    array (
      'client-settings' => 
      array (
        'api_key' => 'xyz',
        'nodes' => 
        array (
          0 => 
          array (
            'host' => 'localhost',
            'port' => '8108',
            'path' => '',
            'protocol' => 'http',
          ),
        ),
        'nearest_node' => 
        array (
          'host' => 'localhost',
          'port' => '8108',
          'path' => '',
          'protocol' => 'http',
        ),
        'connection_timeout_seconds' => 2,
        'healthcheck_interval_seconds' => 30,
        'num_retries' => 3,
        'retry_interval_seconds' => 1,
      ),
      'model-settings' => 
      array (
      ),
    ),
  ),
  'seotools' => 
  array (
    'inertia' => false,
    'meta' => 
    array (
      'defaults' => 
      array (
        'title' => 'Sunhour Group Co., Ltd',
        'titleBefore' => false,
        'description' => 'Explore premium water pumps, filters, faucets, solar systems, tiles, and more in Cambodia with Sunhour Group Co., Ltd.',
        'separator' => ' | ',
        'keywords' => 
        array (
          0 => 'Water Pump',
          1 => 'Water Transfer',
          2 => 'Filter',
          3 => 'Toilet',
          4 => 'Faucet',
          5 => 'Heat Pump',
          6 => 'Dispenser',
          7 => 'Tiles',
          8 => 'Home Shower',
          9 => 'Solar Water',
          10 => 'Bathub',
          11 => 'Storage Water',
          12 => 'Accessories',
          13 => 'Transfer Pump',
          14 => 'Home Drinking Water',
          15 => 'Water System',
        ),
        'canonical' => NULL,
        'robots' => 'index, follow',
      ),
      'webmaster_tags' => 
      array (
        'google' => NULL,
        'bing' => NULL,
        'alexa' => NULL,
        'pinterest' => NULL,
        'yandex' => NULL,
        'norton' => NULL,
      ),
      'add_notranslate_class' => false,
    ),
    'opengraph' => 
    array (
      'defaults' => 
      array (
        'title' => 'Sunhour Group Co., Ltd',
        'description' => 'Premium water and home systems in Cambodia from Sunhour Group Co., Ltd.',
        'url' => NULL,
        'type' => 'website',
        'site_name' => 'Sunhour Group Co., Ltd',
        'images' => 
        array (
          0 => 'https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg',
        ),
      ),
    ),
    'twitter' => 
    array (
      'defaults' => 
      array (
        'card' => 'summary_large_image',
        'site' => '@SunHourGroup',
      ),
    ),
    'json-ld' => 
    array (
      'defaults' => 
      array (
        'title' => 'Sunhour Group Co., Ltd',
        'description' => 'Explore water pumps, solar water, filters, and more from Sunhour Group Co., Ltd in Cambodia.',
        'url' => NULL,
        'type' => 'WebPage',
        'images' => 
        array (
          0 => 'https://www.toto.com/en/neorestcollections/images/p_mainv_sp.jpg',
        ),
      ),
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'E:\\sunhour\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'E:\\sunhour\\resources\\views',
    ),
    'compiled' => 'E:\\sunhour\\storage\\framework\\views',
  ),
  'sitemap' => 
  array (
    'guzzle_options' => 
    array (
      'cookies' => true,
      'connect_timeout' => 10,
      'timeout' => 10,
      'allow_redirects' => false,
    ),
    'execute_javascript' => false,
    'chrome_binary_path' => NULL,
    'crawl_profile' => 'Spatie\\Sitemap\\Crawler\\Profile',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
