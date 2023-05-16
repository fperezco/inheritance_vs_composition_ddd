<br/>

<h3 align="center">Inheritance VS Composition</h3>

  <p align="center">
    Just a playground about Inheritance VS Composition following Domain-Driven Design Aggregates rules
  </p>

## Table Of Contents

* [About the Project](#about-the-project)
* [Built With](#built-with)
* [Getting Started](#getting-started)
    * [Prerequisites](#prerequisites)
    * [Installation](#installation)
* [Usage](#usage)
* [Authors](#authors)
* [References](#references)

## About The Project

Just a playground in PHP about Inheritance VS Composition following Domain-Driven Design Aggregates rules

#### To resume:

"Composition" favors the rule about associates Aggregates via ID not via object reference due to the polymorfism 
is build over the certainty that comments owners should be referenced via uuid and not in a parent class (due to it is not exists)

The "inheritance" version let you open two doors not DDD friendly:

1.- You are tempted to connect comments to the parent class object instead of using a uuid reference.

2.- You can as well set comments as and array inside parent class (violating the fact that both are Aggregates)

## Built With

PHP & Symfony framework

## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.

* docker

```sh
docker-compose build && docker-compose up -d
```

* composer
```sh
composer install
```

### Installation

1. Get a docker at [https://www.docker.com/](https://www.docker.com/)


2. Clone the repo

```sh
git clone https://github.com/fperezco/creational_patterns.git
```

3. Go inside docker machine and Install Composer packages

```sh
 docker-compose exec apache-php composer install
```


## Usage

Feel free to go into **/src** to take a look code or execute tests concerning them in the **/tests** folder.

## Authors

* **Paco Pérez** - *Full Stack Developer* - [Paco Perez](https://github.com/fperezco)

## References

* [Mareg commentable example](https://github.com/mareg/commentable)
* [Enterprise Crafmanship, about aggregates ](https://enterprisecraftsmanship.com/posts/link-to-an-aggregate-reference-or-id/):
