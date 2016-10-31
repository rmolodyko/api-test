The API Platform Framework
==========================

## Auth 

1. https://github.com/lexik/LexikJWTAuthenticationBundle/blob/master/Resources/doc/1-configuration-reference.md
2. http://kolabdigital.com/lab-time/symfony-json-web-tokens-authentication-guard
3. http://stackoverflow.com/questions/35344563/symfony2-and-angular-user-authentication

## Fixtures

1. https://github.com/fzaninotto/Faker
2. http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
3. https://github.com/nelmio/alice#table-of-contents
4. https://github.com/h4cc/AliceFixturesBundle
5. https://github.com/h4cc/AliceDemo/blob/master/src/h4cc/AliceDemoBundle/DataFixtures/Alice/selenium.yml

```
    "doctrine/data-fixtures": "^1.2"
    "theofidry/alice-data-fixtures": "^1.0@dev",
    "doctrine/doctrine-fixtures-bundle": "^2.3"
```

Exec fixtures: 

    sudo php bin/console doctrine:fixtures:load

## Doctrine association

1. http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/working-with-associations.html

## Testing

Run tests

    php vendor/bin/behat

## Security

1. http://stackoverflow.com/questions/29309215/security-yml-causes-invalidargumentexception-you-must-at-least-add-one-authent
2. http://symfony.com/doc/current/security/guard_authentication.html