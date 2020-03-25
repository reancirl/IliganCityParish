Undergrad capstone project titled A Web based Record Management System for Iligan City Parish churches.
<hr>
<h3>Steps to setup:</h3>
<ol>
	<li>Clone this repo: git clone https://github.com/reancirl/IliganCityParish.git</li>
	<li>cd IliganCityParish</li>
	<li>composer install</li>
	<li>cp .env.example .env</li>
	<li>php artisan key:generate</li>
	<li>create a database in phpmyadmin or any available</li>
	<li>edit .env file in the project:</li>
		<ul>
			<li>DB_DATABASE change to the database you created in phpmyadmin</li>
			<li>DB_USERNAME to root</li>
			<li>DB_PASSWORD to empty</li>
		</ul>
	<li>php artisan migrate</li>
	<li>php artisan db:seed</li>
	<li>php artisan serve</li>
</ol>
<hr>
email : super@admin.com <br>
password : password