Simple Blog System

This is a basic blog system where users can view, create, edit, and delete posts. The system provides a straight forward interface for managing blog posts and viewing them.


Setup and Operation:
1.	Execute the provided 'blogdb.sql' script to create the necessary database and tables.
2.	To register or login, visit http://localhost/blog/admin/login.php. Upon registration, new users are automatically assigned the role of 'user'.
3.	Locate the initial user entry in the 'users' table and manually switch their role from 'user' to 'admin' using phpMyAdmin. This action is a one-time task. Subsequently, this 'admin' user will have the capability to modify roles for all users via 'users.php'.
4.	Regular users can log in using their credentials and access the basic features of the application.
5.	After logging in, view all blog posts by visiting (posts.php).
6.	If your role is 'user', you can "add" and "show" posts. If it's 'admin', you can also "edit" and "delete".