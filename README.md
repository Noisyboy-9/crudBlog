# DDD blog Crud
this is a project to learn DDD architecture <br />
this project uses slim php framework and MongoDB as database 

## how to setup
* first clone this repo <br />
```git 
git clone https://github.com/Noisyboy-9/crudBlog.git
```
* then setup your mongo db to have a database called blogs, and a collection called posts
* cd into your projcet directory and update composer
```composer
composer update
```
enjoy!
## Code Architecture
in this project I decided to use a DDD based architecture called **Hexagonal** architecture. <br />
#### Hexagonal Architecture brief explanation
in this architecture the front layer send's HTTP requests to a **Domain Service** which acts like the controller part of MVC architectures. <br />
domain service then accepts the request and uses value objects to validate the incoming requests and then sends an entity (if needed) to service repo. <br />
service repo uses database connection layer to connect and exacute querries to the database 