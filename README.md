# StateLessShop

StateLessShop is an simple eCommerce System that provide an API and basic Administration Tools to run
a Shop based on Standard HTTP Protocols without Sessions to be Stateless.

## Features

### Order

Simple actions on an Order

 - create an order
 - pay an order
 - ship an order

## Design Concepts

### Entity vs. Value Objects
Value Objects are defined by the Values of the Object and not by any Identifier.
So if the Values of the Object changed the is not longer the same Object.
E.g.: An Address Object is Immutable, because if the Street changed the Address is
not longer the Same.

Entity Objects are not defined by their Values but rather by an Identifier. E.g.: a
Customer Object is an Entity because if the Address changed the Customer is still the
same Customer.