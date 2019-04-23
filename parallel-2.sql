-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8081
-- Generation Time: Apr 16, 2019 at 03:51 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: parallel
--

-- --------------------------------------------------------

--
-- Table structure for table Customer
--

CREATE TABLE Customer
(
  CID int(11) NOT NULL,
  FirstName varchar(45) DEFAULT NULL,
  LastName varchar(45) DEFAULT NULL,
  Tel varchar(45) DEFAULT NULL,
  Gender varchar(45) DEFAULT NULL,
  Address varchar(50) DEFAULT NULL,
  LogIn_UID int(11) DEFAULT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table Customer
--

INSERT INTO Customer
  (CID, FirstName, LastName, Tel, Gender, Address, LogIn_UID)
VALUES
  (1, 'Nicha', 'Wila', '0864157868', 'female', '124', 2),
  (2, 'Theevara', 'Payappai', '0999999999', 'Female', '144', 3),
  (3, 'joel', 'hammond', '098-777-6677', 'male', '98 Santa Clarita', 4);

-- --------------------------------------------------------

--
-- Table structure for table LogIn
--

CREATE TABLE LogIn
(
  UID int(11) NOT NULL,
  UserType varchar(45) DEFAULT 'Customer',
  Email varchar(45) DEFAULT NULL,
  Password varchar(45) DEFAULT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table LogIn
--

INSERT INTO LogIn
  (UID, UserType, Email, Password)
VALUES
  (1, 'Admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
  (2, 'Customer', 'ike@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
  (3, 'Customer', 'prw@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
  (4, 'Customer', 'joel98@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table Order
--

CREATE TABLE Order
(
  OrderID int(11) NOT NULL,
  OrderDate date DEFAULT NULL,
  OrderTime time NOT NULL,
  TotalPrice int(11) DEFAULT NULL,
  Customer_CID int(11) DEFAULT NULL,
  orderStatus varchar(25) NOT NULL DEFAULT 'Cooking'
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table Order
--

INSERT INTO Order
  (OrderID, OrderDate, OrderTime, TotalPrice, Customer_CID, orderStatus)
VALUES
  (1, '2019-04-15', '20:09:12', 135, 3, 'Cooking'),
  (2, '2019-04-15', '20:15:05', 45, 3, 'Cooking'),
  (3, '2019-04-15', '20:16:32', 45, 3, 'Cooking'),
  (4, '2019-04-15', '20:17:37', 45, 3, 'Cooking'),
  (5, '2019-04-15', '20:18:20', 135, 3, 'Cooking'),
  (6, '2019-04-15', '20:20:31', 180, 3, 'Cooking'),
  (7, '2019-04-15', '20:21:28', 180, 3, 'Cooking'),
  (8, '2019-04-15', '20:29:31', 270, 3, 'Cooking'),
  (9, '2019-04-15', '20:31:26', 270, 3, 'Cooking'),
  (10, '2019-04-15', '20:34:13', 90, 3, 'Cooking'),
  (11, '2019-04-15', '20:49:19', 90, 3, 'success'),
  (12, '2019-04-15', '21:02:14', 135, 3, 'Cooking'),
  (13, '2019-04-15', '21:02:26', 90, 3, 'Cooking');

-- --------------------------------------------------------

--
-- Table structure for table OrderDetail
--

CREATE TABLE OrderDetail
(
  OrderDetailID int(11) NOT NULL,
  Quantity int(11) DEFAULT NULL,
  Product_ProductID int(11) DEFAULT NULL,
  Order_OrderID int(11) DEFAULT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table OrderDetail
--

INSERT INTO OrderDetail
  (OrderDetailID, Quantity, Product_ProductID, Order_OrderID)
VALUES
  (1, 1, 3, 11),
  (2, 1, 4, 11),
  (3, 2, 3, 12),
  (4, 1, 4, 12),
  (5, 1, 1, 13),
  (6, 1, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table Product
--

CREATE TABLE Product
(
  ProductID int(11) NOT NULL,
  ProductName varchar(45) DEFAULT NULL,
  Price int(11) DEFAULT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table Product
--

INSERT INTO Product
  (ProductID, ProductName, Price)
VALUES
  (1, 'pie', 45),
  (2, 'cake', 45),
  (3, 'popcorn', 45),
  (4, 'brownies', 45);

-- --------------------------------------------------------

--
-- Table structure for table Staff
--

CREATE TABLE Staff
(
  SID int(11) NOT NULL,
  FirstName varchar(45) DEFAULT NULL,
  LastName varchar(45) DEFAULT NULL,
  Tel varchar(45) DEFAULT NULL,
  Address varchar(45) DEFAULT NULL,
  LogIn_UID int(11) DEFAULT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table Staff
--

INSERT INTO Staff
  (SID, FirstName, LastName, Tel, Address, LogIn_UID)
VALUES
  (1, 'A', 'Baker', '0989990088', '56 Baker Street', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table Customer
--
ALTER TABLE Customer
  ADD PRIMARY KEY (CID)
,
ADD KEY customer_ibfk_1
(LogIn_UID);

--
-- Indexes for table LogIn
--
ALTER TABLE LogIn
  ADD PRIMARY KEY (UID);

--
-- Indexes for table Order
--
ALTER TABLE Order
  ADD PRIMARY KEY (OrderID)
,
ADD KEY Customer_CID
(Customer_CID);

--
-- Indexes for table OrderDetail
--
ALTER TABLE OrderDetail
  ADD PRIMARY KEY (OrderDetailID)
,
ADD KEY Product_ProductID
(Product_ProductID),
ADD KEY Order_OrderID
(Order_OrderID);

--
-- Indexes for table Product
--
ALTER TABLE Product
  ADD PRIMARY KEY (ProductID);

--
-- Indexes for table Staff
--
ALTER TABLE Staff
  ADD PRIMARY KEY (SID)
,
ADD KEY LogIn_UID
(LogIn_UID);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table Customer
--
ALTER TABLE Customer
  MODIFY CID int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table LogIn
--
ALTER TABLE LogIn
  MODIFY UID int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table Order
--
ALTER TABLE Order
  MODIFY OrderID int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table OrderDetail
--
ALTER TABLE OrderDetail
  MODIFY OrderDetailID int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table Product
--
ALTER TABLE Product
  MODIFY ProductID int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table Staff
--
ALTER TABLE Staff
  MODIFY SID int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table Customer
--
ALTER TABLE Customer
  ADD CONSTRAINT customer_ibfk_1 FOREIGN KEY (LogIn_UID) REFERENCES LogIn (UID) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table Order
--
ALTER TABLE Order
  ADD CONSTRAINT order_ibfk_1 FOREIGN KEY (Customer_CID) REFERENCES Customer (CID) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table OrderDetail
--
ALTER TABLE OrderDetail
  ADD CONSTRAINT orderdetail_ibfk_1 FOREIGN KEY (Product_ProductID) REFERENCES Product (ProductID) ON DELETE SET NULL ON UPDATE CASCADE
,
ADD CONSTRAINT orderdetail_ibfk_2 FOREIGN KEY
(Order_OrderID) REFERENCES Order
(OrderID) ON
DELETE
SET NULL
ON
UPDATE CASCADE;

--
-- Constraints for table Staff
--
ALTER TABLE Staff
  ADD CONSTRAINT staff_ibfk_1 FOREIGN KEY (LogIn_UID) REFERENCES LogIn (UID) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
