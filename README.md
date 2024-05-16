Simple Blog System

This is a basic blog system where users can view, create, edit, and delete posts. The system provides a straightforward interface for managing blog posts and viewing them.


Setup and Operation:
1.	Execute the provided blogdb.sql script to create the necessary database and tables.
2.	To register or login, visit http://localhost/blog/admin/login.php. Upon registration, new users are automatically assigned the role of 'user'.
3.	Admin users must be manually updated via phpMyAdmin. Locate the first user entry in the "users" table and change their role to 'admin'.
4.	Admin users can log in using their credentials and navigate to (users.php). Here, they can effortlessly view a comprehensive list of all users alongside their respective roles and adjust the roles of users between 'user' and 'admin'.
5.	Regular users can log in using their credentials and access the basic features of the application.
6.	After logging in, view all blog posts by visiting (posts.php). Please ensure you are logged in beforehand.
7.	If your role is 'user', you can add and show posts. If it's 'admin', you can also edit and delete.

