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

### API architecture

I built the architecture based on RESTFul standards:
- plural names on endpoints URIs
- statelessness on requests
- always returning JSON (standard response interface)

I say "based on" because one of the REST architecture constraints is **client-server separation** which (in my opinion) isn't achieved on this project since Vue and Laravel share the same server besides running on different ports.

### Why a Service layer, and why using ServiceInterfaces?

1. I used MVC architecture as Laravel suggests, however **keeping business logic coupled with data persistance** was not on my plans. To enhance clarity on development, avoid messy code and help a possible scalability at medium term, I decided to **use _Controller_ to handle business logic** and **use _Service_ to handle data persistance**.

2. This decision was also due to keep my code closer to ActiveRecord pattern that Laravel proposes on its given architecture. I know that ActiveRecord implement business logic and data persistance together on the Model abstraction layer but I don't want to keep those concerns mixed due to the reasons that I exposed at point 1 here.

3. The ServiceInterfaces are to _keep code decoupled_, so in the future implementing tests will cost less effort.

### Migrations and Seeders

1. Migrations, in my experience of developer, is a great tool to handle database changes effectively. Table structure changes, adding/removing tables and other database operations are made with single CLI commands.

2. Seeders are used here only to demonstration purposes. I would rather prefer inserting data manually to keep coherent data, but for this technical test, a random seed is OK.

## Front-end of Story 001

### Why Vue components' directories are set up the way they are?

I made the front-end architecture oriented by domain context: each component is inside a folder whose name is related to its "context", e.g: `ProjectArea.vue` is inside `resources/js/components/project`. This way, developers will know where to find components.

### Why each component's CSS isn't inside `<style scoped>` hard-coded?

CSS files are on a separated folder: `resources/css` to attempt to make CSS **framework-agnostic**, thus switching to another framework such as React or Angular would be smoothier.

### Why the `resources/js/scripts` folder?

Same reason as last question: **framework-agnostic**-ness and also to keep API and states _decoupled from framework code_, turning it easier to maintain.

The `scripts` folder has two subdirectories: `api`, where API methods are separated by context, like `project.js`; and `composables`, where the composables are. The composables use the 'useComposableName' terminology, [as recommended by Vue](https://vuejs.org/guide/reusability/composables#:~:text=import%20%7B%20ref%2C%20onMounted%2C%20onUnmounted%20%7D%20from%20%27vue%27%0A%0A//%20by,state%20as%20return%20value%0A%20%20return%20%7B%20x%2C%20y%20%7D%0A%7D). Encapsulation of composable functionality is also applied to keep business logic separated from framework-specific code.

### Axios

Instead of using the Javascript-embedded `Fetch API`, I preferred to use `Axios`, since I can instantiate Axios and set its configurations only once - as I did in `api.js`. I would prefer to use environment variables to get Axios instance's `baseURL` but I got stuck on a bug that held me there for a while. As this wasn't related to the main story tasks and I was running out of time, I solved the problem by hard-coding the base URL. _I just want to state that I don't usually do it this way; if I had more time, I would fix this before delivering it._

## Developer Experience questions

### 1. Why only Story-001 was (partially) done?

I could have done it before if I decided to do both back-end and front-end without following the best practices that I know so far; but since I want to showcase all the skills that I have got until now, I had to do it this way, thus taking more time.

### 2. How much time I would need to actually finish all tasks?

- Story-001: more 3 days
- Story-002: more 9 days

Summing up the two days here, I would say that I would take possibly 12 more days to finish it all, keeping the code quality that I am aiming to keep.

### 3. Do I think that there is a way to finish this project in the recommended time (2 hours)?

Doing it carefully, no.

### 4. What I would like to do if I had more time?

- Use `pinia` or [`provide - inject`](https://vuejs.org/guide/components/provide-inject#provide) to re-order Projects by name or by date, avoiding [prop drilling](https://vuejs.org/guide/components/provide-inject#prop-drilling).
- Also use `pinia` or [`provide - inject`](https://vuejs.org/guide/components/provide-inject#provide) to filter Projects by name, avoiding [prop drilling](https://vuejs.org/guide/components/provide-inject#prop-drilling).
- Make a Login flow, using [Sanctum](https://laravel.com/docs/10.x/sanctum) for user authentication and route guarding.
- Develop Story-002 from start to finish - I was really looking forward to use WebSockets because [I was studying it](https://github.com/joaoefornazari/websockets-101).
- Use environment variables to load Axios's `baseURL` configuration.
