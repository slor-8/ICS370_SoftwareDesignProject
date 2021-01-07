CREATE DATABASE OpenSeasBank;
USE  OpenSeasBank;

DROP TABLE IF EXISTS systemAdmin;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS checkingAccount;
DROP TABLE IF EXISTS savingsAccount;
DROP TABLE IF EXISTS cusContact;
DROP TABLE IF EXISTS cusAddess;
DROP TABLE IF EXISTS cusTransaction;

-- systemAdmin Table --
CREATE TABLE systemAdmin (
	adminID int,
    adminUsername varchar(20),
    adminPassword varchar(20),
    a_firstName varchar(20),
    a_middleName varchar(20),
    a_lastName varchar(20),
    enable_disable int,
    primary key (adminID)
);

-- input data to table systemAdmin --
INSERT INTO systemAdmin VALUES (1, 'admin1', 'admin123', 'Susan', 'Beth', 'White', 1);
INSERT INTO systemAdmin VALUES (2, 'admin2', 'admin456', 'John', 'Timothy', 'Smith', 1);

-- customer Table --
CREATE TABLE customer (
	customerID int,
    c_firstName varchar(20),
    c_middleName varchar(20),
    c_lastName varchar(20),
	cusUsername varchar(20),
    cusPassword varchar(20),
    enable_disable int,
    adminID int,
    primary key (customerID, cusUsername),
    foreign key (adminID) references systemAdmin (adminID)
);


-- input data to table customer --
INSERT INTO customer VALUES (1, 'Mary', ' ', 'Johnson', 'maryj4', 'mary123', 1, 1); 
INSERT INTO customer VALUES (2, 'Chris', ' ', 'Schultz', 'schultz2chris', 'chris123', 1, 1); 

-- checkingAccount Table --
CREATE TABLE checkingAccount (
	accountID int,
    customerID int,
    balance float,
    primary key (accountID),
    foreign key (customerID) references customer(customerID)
);

-- input data to table checkingAccount --
INSERT INTO checkingAccount VALUES (1768543954, 1, 598.34);
INSERT INTO checkingAccount VALUES (1368468906, 2, 389.22);

-- savingsAccount Table --
CREATE TABLE savingsAccount (
	accountID int,
    customerID int,
    balance float,
    primary key (accountID),
    foreign key (customerID) references customer(customerID)
);

-- input data to table savingsAccount --
INSERT INTO savingsAccount VALUES (1768543454, 1, 0.00);
INSERT INTO savingsAccount VALUES (1368468443, 2, 1020.60);

-- cusContact Table --
CREATE TABLE cusContact (
	customerID int,
    primaryNum varchar(10),
    secondaryNum varchar(10),
    email varchar(20),
    primary key (customerID),
    foreign key (customerID) references customer(customerID)
);

-- input data to table cusContact --
INSERT INTO cusContact VALUES (1, '6514889056', '6512286948', 'mary123@gmail.com');
INSERT INTO cusContact VALUES (2, '6123447654', '7639286711', 'chris456@gmail.com');

-- cusAddress Table --
CREATE TABLE cusAddress (
	customerID int,
    streetNum int,
    streetName varchar(50),
    cityName varchar(50),
    stateName varchar(50),
    zipcode int,
    primary key (customerID),
    foreign key (customerID) references customer(customerID)
);

-- input data to table cusAddress --
INSERT INTO cusAddress VALUES (1, 1234, 'Johnsonville Ave', 'Minneapolis', 'Minnesota', 55134);
INSERT INTO cusAddress VALUES (2, 5678, '71st Ave E', 'St.Paul', 'Minnesota', 55135);

-- cusTransaction Table --
CREATE TABLE cusTransaction (
	transactionID int NOT NULL AUTO_INCREMENT,
	customerID int,
    accountFrom int,
    accountTo int,
    date date,
    amount float,
    primary key (transactionID),
    foreign key (customerID) references customer(customerID)
);
