
# Application Architecture:
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

