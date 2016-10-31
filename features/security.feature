Feature: Security features
  Manage security with jwt

  Background:
    Given Refresh database
    And Create api customer

  Scenario: Log in
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
