# A pseudocode implementation of a URL Shortening API.

Due to time constraints and my lack of PHP knowledge (syntax, tools, conventions) the task has been completed in pseudocode so as to focus on the project structure and the logic of the service. Creation of view classes has also been left out as it was not necessary for the solution. Below is a basic overview of the repository.

Tests:
Unfortunately there was not time to add tests, although if I had been more familiar with the tools I would have used a TDD approach.

Controllers:
Two controllers have been created. the first handles creation, deletion and reading of URLs (updation is not necessary). The second returns the URL based on the Id passed in a URL variable.

Data Access:
The repository pattern has been used along with PDO to separate data access from the controllers and allow data sources to be easily swapped out.

Docker:
Two containers are used for running the application, one MySQL container and one apache server with PHP installed and configured with a vhost.conf file. Ideally, logic would be added to run the SQL commands in resources/database.sql to automate table creation when the container is ran.

Public files:
For client accessible items

Bootstrapper:
App entry point
