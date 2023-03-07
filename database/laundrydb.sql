-- Create Customers table
CREATE TABLE Customers (
  customer_id INT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
--   email VARCHAR(100) UNIQUE,
  phone VARCHAR(20),
  0 VARCHAR(200),
--   balance DECIMAL(10,2) DEFAULT 0
);

-- Create Orders table
CREATE TABLE Orders (
  order_id INT PRIMARY KEY,
  customer_id INT,
  order_date DATE NOT NULL,
  pickup_date DATE NOT NULL,
  delivery_date DATE,
  status VARCHAR(20) NOT NULL,
  total_amount DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

-- Create Items table
-- Items acceptable for washing
CREATE TABLE Items (
  item_id INT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(50) NOT NULL,
  description VARCHAR(200)
);

-- Create OrderItems table to store the items in each order
-- actual order with reference to items
CREATE TABLE OrderItems (
  order_id INT,
  item_id INT,
  quantity INT,
  PRIMARY KEY (order_id, item_id),
  FOREIGN KEY (order_id) REFERENCES Orders(order_id),
  FOREIGN KEY (item_id) REFERENCES Items(item_id)
);

-- Create Payments table to store payments made by customers
CREATE TABLE Payments (
  payment_id INT PRIMARY KEY,
  customer_id INT,
  payment_date DATE NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

-- -- Create Employees table to store information about each employee
-- CREATE TABLE Employees (
--   employee_id INT PRIMARY KEY,
--   first_name VARCHAR(50) NOT NULL,
--   last_name VARCHAR(50) NOT NULL,
--   email VARCHAR(100) UNIQUE,
--   phone VARCHAR(20),
--   address VARCHAR(200),
--   position VARCHAR(50) NOT NULL,
--   hourly_rate DECIMAL(10,2) NOT NULL
-- );

-- -- Create Shifts table to store information about each employee's shift
-- CREATE TABLE Shifts (
--   shift_id INT PRIMARY KEY,
--   employee_id INT,
--   shift_start TIMESTAMP NOT NULL,
--   shift_end TIMESTAMP,
--   FOREIGN KEY (employee_id) REFERENCES Employees(employee_id)
-- );

-- Create a function to calculate the total revenue from orders for a given date range
CREATE FUNCTION total_revenue(start_date DATE, end_date DATE)
RETURNS DECIMAL(10,2)
BEGIN
  DECLARE revenue DECIMAL(10,2);
  SELECT SUM(total_amount) INTO revenue FROM Orders WHERE order_date BETWEEN start_date AND end_date;
  RETURN revenue;
END;

-- Create a view to display the top 10 items by revenue for a given date range
CREATE VIEW TopItemsByRevenue AS
SELECT Items.name, SUM(OrderItems.quantity) AS quantity, SUM(OrderItems.quantity * Items.price) AS revenue
FROM Items
INNER JOIN OrderItems ON Items.item_id = OrderItems.item_id
INNER JOIN Orders ON OrderItems.order_id = Orders.order_id
WHERE Orders.order_date BETWEEN '2022-01-01' AND '2022-12-31'
GROUP BY Items.name
ORDER BY revenue DESC
LIMIT 10;

-- -- Create a view to display the employees who worked the most hours in a given date range
-- CREATE VIEW TopEmployeesByHours AS
-- SELECT Employees.first_name, Employees.last_name, SUM(TIMESTAMPDIFF(MINUTE, shift_start, shift_end))/60 AS hours_worked
-- FROM Employees
-- INNER JOIN Shifts O