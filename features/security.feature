Feature: Security features
  Manage security with jwt

  Background:
    Given Refresh database
    And Create api customer

  Scenario: Log in successful
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/login" with body:
    """
    {
      "email": "customer@customer.api",
      "password": "customer"
    }
    """
    Then the response status code should be 200
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/json"
    And the JSON node "token" should exist

  Scenario: Log in wrong password
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/login" with body:
    """
    {
      "email": "customer@customer.api",
      "password": "customer_wrong"
    }
    """
    Then the response status code should not be 200

  Scenario: Log in wrong email
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/login" with body:
    """
    {
      "email": "customer@customer.api_wrong",
      "password": "customer"
    }
    """
    Then the response status code should not be 200

  Scenario: Log in wrong input data "email"
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/login" with body:
    """
    {
      "email_wrong": "customer@customer.api",
      "password": "customer"
    }
    """
    Then the response status code should not be 200

  Scenario: Log in wrong input data "password"
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/login" with body:
    """
    {
      "email_wrong": "customer@customer.api",
    }
    """
    Then the response status code should not be 200

  @dropSchema
  Scenario: Log in empty data
    When I add "Content-Type" header equal to "application/json"
    And I add "Accept" header equal to "application/json"
    And I send a "POST" request to "/api/login" with body:
    """
    {}
    """
    Then the response status code should not be 200
