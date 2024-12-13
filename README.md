# API Blog System

- clone the repo. 
- set up env configuration for database and mail configuration
- please run these commands
- composer install.
- make sure server is running so run php artisan serve 
- php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
- php artisan migrate
- for dummy data run the seeder: php artisan db:seed

hit the APIs
api/login provide credentials
- login using users' credentials
- email : test@g.com, password : 123456
- get the token & on the Authorization tab set in Bearer Token.

now you are authorized as user, so you can hit the below api or view the api.php file

# Post
- api/posts
- api/post/store
- post/update/{postId}
- post/postId/{comments}
- post/delete/{postId}


# Comments
- post/{postId}/comment/store
- comment/update/{commentId}
- comment/delete/{commentId}

- whenever new post is create, mail is send to user so please make configuration for mail also.