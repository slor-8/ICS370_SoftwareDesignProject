Extract ICS370_Project.zip into the xampp/htdocs folder

Turning on XAMPP:
1. Open XAMMP
2. Click "Start" for both Apache and MySQL.

Database:
1. Go on your web browser. In the URL type: "localhost/phpmyadmin/"
2. On the left side click "New" to add database.
4. Import (located at the top) OpenSeasBankSQL.SQL in ICS370_Project folder.

Run Database Program:
1. In a new tab type in the URL: "localhost/ICS370_Project/home_page.php"
2. To see from a client's view - Log in using the username: maryj4 and password: mary123
 	a) The client's homepage should show the client's accounts and account balances.
	b) Click on "transfer"-> client will be able to make transactions.
		- click on "view transactions" -> client will be able to view all transactions they've made between
		their respective bank accounts.
	c) Click on "settings" -> client will be able to change their address, phone number, and email address.
	d) Click on "edit profile" -> client will be able to change their name and password. 
	e) Click on "logout" to logout of the client's account. 
3. To see from an admin's view - Log in using the username: admin1 and password: admin123
	a) The admin's homepage should show all clients who have an online account with them. Admins can get a list
	of people who's accounts are disabled and those who's accounts are enabled. Admins can also search for the
	customer accounts through their first name.
		-The admin can edit the client's information and update it. Admin also have access to enable/disable the client's
		account if needed when a client is no longer working with the bank.
	b) Click on "admin information" -> should show all clients who have an online account with them. Admins can get a list
	of people who's accounts are disabled and those who's accounts are enabled. Admins can also search for the
	customer accounts through their first name.
		-The admin can edit the client's information and update it. Admin also have access to enable/disable the client's
		account if needed when a client is no longer working with the bank.
	c) Click on "edit profile" -> admin will be able to change their name and address. 
	d) Click on "logout" to logout of the admin account. 