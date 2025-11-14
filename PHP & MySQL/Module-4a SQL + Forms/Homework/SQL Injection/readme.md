Here's an example PHP form and a simple script to demonstrate SQL injection vulnerabilities.
Please use this for educational purposes only and in a controlled environment.

### Explanation

- The `form.html` file contains a simple HTML form that collects the username and password.
- The `process.php` file processes the form input and constructs a SQL query that is vulnerable to SQL injection.
- The `db.sql` file can be run to create a MySQL table `users` that contains a sample user for testing.

### Demonstrating SQL Injection

1. **Run the SQL `db.sql`** to create a `users` table in your MySQL Database
2. **Run the form and PHP script** on your server.
3. **Submit the form** with the username: `admin` and password: `admin123` to see a successful login.
4. **Submit the form** with the username: `admin' OR '1'='1` and any password to demonstrate an SQL injection attack.

This code is intentionally vulnerable to SQL injection. To mitigate such vulnerabilities, always use prepared statements or parameterized queries.

### Secure Version with Prepared Statements

`secure.php` is a secure version of `process.php` using prepared statements.

This secure version prevents SQL injection by using prepared statements with bound parameters.