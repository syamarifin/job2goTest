# Technical Test Backend Job2go

Projek ini di buat intuk menghubungkan backend dengan frontend, project ini menggunakan teknologi laravel 7 dan MySQL yang terdiri dari beberapa modul seperti:

- Register.
- Login.
- Reset Password.
- Project.
- Task.

- Pertama clone project dari github dan simpan project di xampp.
- Buat Database dengan nama job2go_test.
- Migrasi tabel dengan menjalankan perintah.
```java
php artisan migrate
```
- Jalan project dengan perintah.
```java
php artisan serve
```
## API Documentasi
### USER

Method "USER" terdiri dari 3 fungsi yakni register dan login.
| Method   | Url                    | Parameter (data)      |
| -------- | ---------------------- | --------------------- |
| **POST** | auth/register          | name, email, password, password_confirmation, level(admin,buruh)  |
| **POST** | auth/login             | email, password       |
| **POST** | auth/reset-password    | email, password       |

### Contoh Response Register
```java
{
    "message": "User successfully registered",
    "user": {
        "name": "Budi",
        "email": "budi02@gmail.com",
        "level": "admin",
        "updated_at": "2021-01-10T05:56:41.000000Z",
        "created_at": "2021-01-10T05:56:41.000000Z",
        "id": 2
    }
}
```
### Contoh Response Login
```java
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYxMDI1ODQzNSwiZXhwIjoxNjEwMjYyMDM1LCJuYmYiOjE2MTAyNTg0MzUsImp0aSI6IjhCcXdVNEJLWlZLQnh4Z20iLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.yAd6DYGmbB0EDvLafD1Ik1CRSLgCG9Vgnvcitud9IFo",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 1,
        "name": "Budi",
        "email": "budi01@gmail.com",
        "level": "admin",
        "email_verified_at": null,
        "api_token": null,
        "created_at": "2021-01-09T03:44:18.000000Z",
        "updated_at": "2021-01-09T03:44:18.000000Z"
    }
}
```

## Project
Method "PROJECT" terdiri dari 2 fungsi yakni register dan login.
| Method   | Url                    | Parameter (data)              |
| -------- | ---------------------- | ----------------------------- |
| **GET**  | project/show           |                               |
| **POST** | project/add            | name, description, due_date   |

### Contoh Response show project
```java
{
    "data": [
        {
            "id": 1,
            "name": "project 1",
            "description": "coba project 1",
            "due_date": "2021-01-10",
            "created_at": "2021-01-10T04:26:46.000000Z",
            "updated_at": "2021-01-10T04:26:46.000000Z"
        },
        {
            "id": 2,
            "name": "project 2",
            "description": "coba project 2",
            "due_date": "2021-01-20",
            "created_at": "2021-01-10T04:40:33.000000Z",
            "updated_at": "2021-01-10T04:40:33.000000Z"
        }
    ]
}
```
### Contoh Response add project
```java
{
    "data": {
        "id": 2,
        "name": "project 2",
        "description": "coba project 2",
        "due_date": "2021-01-20",
        "created_at": "2021-01-10T04:40:33.000000Z",
        "updated_at": "2021-01-10T04:40:33.000000Z"
    }
}
```
## Task
Method "PROJECT" terdiri dari 3 fungsi yakni register dan login.
| Method   | Url                    | Parameter (data)              |
| -------- | ---------------------- | ----------------------------- |
| **GET**  | task/show              |                               |
| **GET**  | task/show-project-task |                               |
| **POST** | task/add               | name, project, description, due_date   |

### Contoh Response show task
```java
{
    "data": [
        {
            "id": 1,
            "project": 1,
            "name": "Task",
            "description": "coba Task 1",
            "due_date": "2021-01-12",
            "created_at": "2021-01-10T04:53:01.000000Z",
            "updated_at": "2021-01-10T04:53:01.000000Z"
        }
    ]
}
```
### Contoh Response show task with project
```java
{
    "data": [
        {
            "id": 1,
            "name": "project 1",
            "description": "coba project 1",
            "due_date": "2021-01-10",
            "created_at": "10/01/2021 04:26:46",
            "updated_at": "10/01/2021 04:26:46",
            "Task_detail": [
                {
                    "id": 1,
                    "project": 1,
                    "name": "Task",
                    "description": "coba Task 1",
                    "due_date": "2021-01-12",
                    "created_at": "2021-01-10T04:53:01.000000Z",
                    "updated_at": "2021-01-10T04:53:01.000000Z"
                }
            ]
        },
        {
            "id": 2,
            "name": "project 2",
            "description": "coba project 2",
            "due_date": "2021-01-20",
            "created_at": "10/01/2021 04:40:33",
            "updated_at": "10/01/2021 04:40:33",
            "Task_detail": []
        }
    ]
}
```
### Contoh Response add task
```java
{
    "data": {
        "id": 1,
        "project": "1",
        "name": "Task",
        "description": "coba Task 1",
        "due_date": "2021-01-12",
        "created_at": "2021-01-10T04:53:01.000000Z",
        "updated_at": "2021-01-10T04:53:01.000000Z"
    }
}
```
