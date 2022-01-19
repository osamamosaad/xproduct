# The Problem
Implement a REST API endpoint that given a list of products, applies some discounts to them
and can be filtered.

**Given this list of products:**
```
{
    "products": [
        {
            "sku": "000001",
            "name": "BV Lean leather ankle boots",
            "category": "boots",
            "price": 89000
        },
        {
            "sku": "000002",
            "name": "BV Lean leather ankle boots",
            "category": "boots",
            "price": 99000
        },
        {
            "sku": "000003",
            "name": "Ashlington leather ankle boots",
            "category": "boots",
            "price": 71000
        },
        {
            "sku": "000004",
            "name": "Naima embellished suede sandals",
            "category": "sandals",
            "price": 79500
        },
        {
            "sku": "000005",
            "name": "Nathane leather sneakers",
            "category": "sneakers",
            "price": 59000
        }
    ]
}
```
**Given that:**
- Products in the **boots** category have a 30% discount.
- The product with sku = **000003** has a 15% discount.
- When multiple discounts collide, the biggest discount must be applied.

**GET /products**:
- Can be filtered by category as a query string parameter
- (optional) Can be filtered by priceLessThan as a query string parameter, this filter applies before
- discounts are applied and will show products with prices lesser than or equal the value provided.
- Returns a list of Product with the given discounts applied when necessary
- Must return at most 5 elements. (The order does not matter)

**Product model:**
- price.currency is always EUR
- When a product does not have a discount, price.final and price.original should be the same number
and discount_percentage should be null.
- When a product has a discount price.original is the original price, price.final is the amount with the
discount applied and discount_percentage represents the applied discount with the % sign.

**Example product with a discount of 30% applied:**
```
{
    "sku": "000001",
    "name": "BV Lean leather ankle boots",
    "category": "boots",
    "price": {
        "original": 89000,
        "final": 62300,
        "discount_percentage": "30%",
        "currency": "EUR"
    }
}
```

# The solution

## Application Architecture:
- I built this app following DDD especially Transaction Script pattern with hexagonal architecture.
- I separated the logic of the application from the framework, you will find it under directory named `xproduct`, the directory structure as the follow:

```
xproduct
|- Application
-----
| - Commands
| - Queries

|- Infrastructure
-----
|- Adapters
|- Exceptions
|- Models
|- Providers
|- Repositories

|- Libraries
-----
|- Clients
|- Common
|- Discount
|- Product

```

**Application:** Is the application layer which contains of:
- `Commands`; here located all command that our application can do like (create discount, and for future: create category, product, add new seller etc..).
- `Queries`; which located the Queries that can appplication do like(listing Products, and for future listing categories, listing sellers etc..)

that will be initial step of using `CQRS` to separate queries from the logic.

**Infrastructure:** layer to safe our domain logic from coupling with the framework or any infrastructure layers.

This layer consists of:
- `Adapters`; Which has for example `ServiceContainer` this is adapter for Laravel service container it isn't used right now but maybe in the future use.
- `Exceptions`; contains all mapped exceptions from framework to our domain logic.
- `Models`; Which is ORM models.
- `Repositories`; the implementation of domain's repositories interfaces.
- `Providers`; to register the mapping between domain interfaces and infrastructure.

**Libraries:** Our core domain logic.

This layer consists of:
- `Product`; product domain logic library, it has its dtos and repositories interfaces, and should has the creation of product or any related logic in the future.
- `Discount`; Discount domain logic.
- `Common`; the common services that can support our domain, to avoide to use freamwork services.
- `Clients`; is SDK helps safe communicated between different domains without any coupling.

**tests:** All Domain logic libraries has tests directory, I wrote testes for `Discount` domain, and `Clints`.

# My hypothesis and thinking for future steps:
I thought about different ways to handle discount on the products
1- to handle discoun on the product on the fly in the DB query, but that will be bad becouse I will do dicsount logic in the query which will not extendable and will put the load on the database in the huge data.
2- to handle discount on the product on the fly, but after retrinving tha data, the soulution extendable but will make the GET request very slow for the huge data, which is not good we need to minimize the request time as much as we can.
3- to handle the discount in command not in query and this command will add the discount in discount table and apply the discount on the product.
I chose the third one, becouse we need to minimize the reading request time, and make this operation not a headache for the system and also as we all know writing is not the same rate as the reading, so to moving the responsability to the Command (writing) is the best choice.

future steps:
if the discount logic is get bigger by the days, we can move it to be microservice and it will be easy becuse there is no cuppling between this service logic and others.

# Important Documents
- [Database Digram](./ERD.png)
- [How to Run the application](./HowToRun.md)
- [API Doc](./src/APIDoc.md)

