# An API with slim micro framerwork
## How to run this:
> I guess I do not even need to say what you need to make it work.
but if you born in another planet, i have to say you should have:
- php v5.5 | or latest
- Composer
- Slim framerwork


 Pick this project and in the root of this, run this command line:
```
php -S localhost:8080 -t public public/index.php
```

if you need help about slim micro framerwork - [Slim Official Website](https://www.slimframework.com/)

Your Development server has running on [localhost:8080](localhost:8080)

> Now you can send some POSTS, GETS, PUTS and DELETES through this url

## What I have done and what I am too lazy to do: :sleeping:

###### asdasdas
> Important Files

- [x] Controller -- He call any other controllers;
- [x] Model -- He call any other models;

>Login

- [x] Sign-in -- Send a post to Localhost:8080/api/login;
- [x] Logout -- Send a get to Localhost:8080/api/login/true;
- [x] Set-Token -- This function is automatically called when we need;
- [x] Validate-Login -- This function is automatically called when we need;

> User

- [x] User registration -- Send a post to Localhost:8080/api/user;
- [x] User editing -- Send a put to Localhost:8080/api/user/{user_id};
- [x] User delete -- Send a delete to Localhost:8080/api/user/{user_id};
- [x] Show all users -- Send a get to Localhost:8080/api/user;
- [x] Show one user -- Send a get to Localhost:8080/api/user/{user_id};
- [ ] Change Password;
- [ ] Change Email;

> Type

- [x] Type registration -- Send a post to Localhost:8080/api/type;
- [x] Type editing -- Send a put to Localhost:8080/api/type/{type_id};
- [x] Type delete -- Send a delete to Localhost:8080/api/type/{type_id};
- [x] Show all types -- Send a get to Localhost:8080/api/type;
- [x] Show one type -- Send a get to Localhost:8080/api/type/{type_id};

> Products

###### I did not even start to develop this.
