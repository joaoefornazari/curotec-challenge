# Curotec Challenge Project's Documentation

## Summary

This Documentation will explain the reasons behind the project architecture, code structure, patterns and styles.

## Back-end of Story-001

The User Story 001 asked for a RESTFul API with endpoints to manipulate Projects, Tasks and Users. I added a Category relation just to enrich the Dashboard experience.

### How do I implemented CRUD operations?

1. Controller methods got different names:
    - Create = New
    - Read = Get / GetAll
    - Update = Edit
    - Delete = Destroy

2. Services' methods are similar to the original acronym meaning:
    - Create = Create
    - Read = GetOne / List
    - Update = Update
    - Delete = Delete

I changend the names between controller and services to avoid confusion when using them through the app.

### CRUD implementation details on resources

1. Project
    - _GetAll_ has a filter by name option

2. Task
    - _GetAll_ always filter results by given project ID

3. Category
    - _GetAll_ has a filter by name option

### Why a Service layer, and why using ServiceInterfaces?

1. I used MVC architecture as Laravel suggests, however **keeping business logic coupled with data persistance** was not on my plans. To enhance clarity on development, avoid messy code and help a possible scalability at medium term, I decided to **use _Controller_ to handle business logic** and **use _Service_ to handle data persistance**.

2. This decision was also due to keep my code closer to ActiveRecord pattern that Laravel proposes on its given architecture. I know that ActiveRecord implement business logic and data persistance together on the Model abstraction layer but I don't want to keep those concerns mixed due to the reasons that I exposed at point 1 here.

3. The ServiceInterfaces are to _keep code decoupled_, so in the future implementing tests will cost less effort.

### Migrations and Seeders

1. Migrations, in my experience of developer, is a great tool to handle database changes effectively. Table structure changes, adding/removing tables and other database operations are made with single CLI commands.

2. Seeders are used here only to demonstration purposes. I would rather prefer inserting data manually to keep coherent data, but for this technical test, a random seed is OK.
