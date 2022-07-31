## About Task

The main function of the task is to fetch data of users from 2 endpoints.

I made **Laravel Command** that runs UserFactory and it iterates over given array of fetchers and get users data well-prepared then save it.

## Running commands

```
php artisan migrate --seed
```

Seed user account for testing

**Email:** admin@admin.com
**Password:** 12345


The command responsible for fetching and saving data

```
php artisan FetchUsers:fetch
```


## Index Users and Search

First thing you need to login

```
curl -XPOST http//task-backend.test/api/login  -H "Accept: application/json" -d "email=admin@admin.com&password=123456"
```

Don't forget to change page parameter and use your Bearer Token

```
curl http//task-backend.test/api/users?page=  -H "Accept: application/json" -H "Authorization: Bearer {...your token...}"
```

Here is search function

```
curl http//task-backend.test/api/users/search?q=AH&page=  -H "Accept: application/json" -H "Authorization: Bearer {...your token...}" 
```


## HTTP Response RFC standard


![alt text](https://github.com/rixtrayker/task-backend/blob/master/rfc-mindmap.jpg?raw=true)
