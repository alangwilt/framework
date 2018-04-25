## The Framework

This project is an attempt at building a web framework in PHP. The project will use all of the accepted PSRs.

As of writing that composes the following list:

* PSR-1: [Basic Coding Standard](https://www.php-fig.org/psr/psr-1)
* PSR-2: [Coding Style Guide](https://www.php-fig.org/psr/psr-2) - requires use of PSR-1 anyway
* PSR-3: [Logger Interface](https://www.php-fig.org/psr/psr-3)
* PSR-4: [Autoloading Standard](https://www.php-fig.org/psr/psr-4)
* PSR-6: [Caching Interface](https://www.php-fig.org/psr/psr-6)
* PSR-7: [HTTP Message Interface](https://www.php-fig.org/psr/psr-7)
* PSR-11: [Container Interface](https://www.php-fig.org/psr/psr-11)
* PSR-13: [Hypermedia Links](https://www.php-fig.org/psr/psr-13)
* PSR-15: [HTTP Handlers](https://www.php-fig.org/psr/psr-15)
* PSR-16: [Simple Cache](https://www.php-fig.org/psr/psr-16)

The PSR list should help guide development of the framework. There are some things that are not covered by the above that will need to be implemented as well:

* Event handling - Important for things like resolving the requests
* Error handling
* Database access - there are no standards covering ORMs
* Auth and registration
* Email notifications
* Route handling
* Views and Templating

The nice thing about using PSR interfaces is that it will make those components much easier to swap out for something else.

One policy of this project will be that if an external package is used, there will need to be an adapter for it, so that the 'business logic' part of the code can remain unchanged and just request.

### Development Stages

#### Stage 1

Initially, I need to get the project set up. This means basic things like the following:

* Coding standards sniffer
* Installing the psr interfaces
* Automated testing set-up - I want this project to be BDD/TDD as much as possible

#### Stage 2

After the initial set up, we need to set the basic features of a web framework up:

* Route Handling
* Request handling
* Returning a response
* Error handling
* Event Handling
* Logging

Can think about Stage 3 and beyond if I ever get there.