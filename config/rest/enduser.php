<?php
return [
  'auth' => [
    'jwt' => [
      'passphrase' => 'uYnS9>kyN#w6;@P2Pcv}%*gBaB:L*#-JbZy-)daf"4Ceg9^AP\'4^@bX]2FFbfJde',
      'private_key' => __DIR__.'/../../storage/jwt/authJwtPrivate.key',
      'public_key' => __DIR__.'/../../storage/jwt/authJwtPublic.key'
    ],
    'service' => [
      'name' => App\Rest\Auth\AuthServiceProvider::DEFAULT_SERVICE_NAME,
      'class' => App\Rest\Spfh\Enduser\Auth\AuthService::class
    ],
    'model' => [
      'lifetime' => 2592000,
      'random_type' => App\Core\Random::TYPE_BASE64URL,
      'random_length' => 64,
      'user_type_id' => App\Db\Spfh\UserType::TYPE_ENDUSER_ID
    ]
  ],
  'providers' => [
    Carbon\Laravel\ServiceProvider::class,
    App\Rest\Auth\AuthServiceProvider::class
  ],
  'middleware' => [
    'stack' => [],
    'routes' => [
      'auth.token' => App\Core\Auth\TokenMiddleware::class,
      'auth.authorized_token' => App\Core\Auth\AuthorizedTokenMiddleware::class,
      'auth.unauthorized_token' => App\Core\Auth\UnauthorizedTokenMiddleware::class
    ]
  ],
  'validation' => [
    'rules' =>  [],
    'implicit_rules' => [],
    'dependent_rules' => []
  ]
];