CREATE TABLE admins (
  Username varchar(32) NOT NULL,
  Password varchar(32) NOT NULL,
  LoginID varchar(32) NOT NULL,
  PRIMARY KEY  (Username),
  KEY Password (Password),
  KEY LoginID (LoginID)
);

CREATE TABLE ads (
  ID int(11) NOT NULL auto_increment,
  Product int(11) NOT NULL,
  PRIMARY KEY  (ID),
  UNIQUE KEY Product (Product)
);

CREATE TABLE orders (
  ID int(11) NOT NULL auto_increment,
  User int(11) NOT NULL,
  Subtotal float NOT NULL,
  Total float NOT NULL,
  Date date NOT NULL,
  PRIMARY KEY  (ID),
  KEY User (User)
);

CREATE TABLE orders_products (
  ID int(11) NOT NULL auto_increment,
  OrderID int(11) NOT NULL,
  ProductID int(11) NOT NULL,
  Quantity int(11) NOT NULL,
  Amount float NOT NULL,
  PRIMARY KEY  (ID),
  KEY OrderID (OrderID)
);

CREATE TABLE products (
  ID int(11) NOT NULL auto_increment,
  ProdName varchar(32) NOT NULL,
  Image varchar(32) NOT NULL,
  Price float NOT NULL,
  PRIMARY KEY  (ID),
  UNIQUE KEY ProdName (ProdName)
);

CREATE TABLE users (
  ID int(11) NOT NULL auto_increment,
  Username varchar(32) NOT NULL,
  Password varchar(32) NOT NULL,
  LoginID varchar(32) NOT NULL,
  PersonalName varchar(128) NOT NULL,
  Email varchar(64) NOT NULL,
  Address varchar(128) NOT NULL,
  City varchar(32) NOT NULL,
  AddrState varchar(32) NOT NULL,
  Country varchar(32) NOT NULL,
  Postcode varchar(32) NOT NULL,
  Phone varchar(20) NOT NULL,
  PRIMARY KEY  (ID),
  UNIQUE KEY Email (Email),
  UNIQUE KEY Username (Username),
  KEY LoginID (LoginID),
  KEY Password (Password)
);

INSERT INTO admins VALUES('test', 'test', '');

INSERT INTO ads VALUES(NULL, 2);
INSERT INTO ads VALUES(NULL, 3);

INSERT INTO products VALUES(NULL, 'Chemicals', 'CHEMICAL.gif', 459.67);
INSERT INTO products VALUES(NULL, 'Factory', 'FACTORY.gif', 345);
INSERT INTO products VALUES(NULL, 'Finances', 'FINANCE.gif', 100);
INSERT INTO products VALUES(NULL, 'Handshake', 'HANDSHAK.gif', 123);
INSERT INTO products VALUES(NULL, 'Ships', 'SHIPPING.gif', 222);
