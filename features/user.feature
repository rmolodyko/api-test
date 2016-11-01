Feature: Manage users
  In order to manage users
  As a client software developer
  I need to be able to retrieve, create, update and delete them trough the API.

  @createSchema
  Scenario: Create an user
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "POST" request to "/api/users" with body:
    """
    {
      "email": "test@motivation.com",
      "plainPassword": "qwerty"
    }
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
      "@context": "/api/contexts/User",
      "@id": "/api/users/1",
      "@type": "User",
      "email": "test@motivation.com"
    }
    """

  Scenario: Get users
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "GET" request to "/api/users"
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json; charset=utf-8"
    And the JSON should be equal to:
    """
    {
        "@context": "\/api\/contexts\/User",
        "@id": "\/api\/users",
        "@type": "hydra:Collection",
        "hydra:member": [
            {
                "@id": "\/api\/users\/1",
                "@type": "User",
                "email": "test@motivation.com"
            }
        ],
        "hydra:totalItems": 1
    }
    """

  @dropSchema
  Scenario: Remove the user
    When I add "Content-Type" header equal to "application/ld+json"
    And I add "Accept" header equal to "application/ld+json"
    And I send a "DELETE" request to "/api/users/1"
    Then the response status code should be 204
