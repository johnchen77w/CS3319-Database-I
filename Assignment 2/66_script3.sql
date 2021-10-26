-- Connect to (use) that database
USE 66_assign2db;

-- Query 1: Show the trip names of all the trips from Italy
SELECT TripName FROM Trip WHERE CountryName="Italy";

-- Query 2: Show the last names of all passengers with no repeats
SELECT DISTINCT LastName FROM Passenger;

-- Query 3: Show all the data in the bus trip table, but show them in order of their trip names from A to Z;
SELECT * FROM Trip ORDER BY TripName;

-- Query 4: List the trip name and country and start date of all trips that start after April 30 of 2022.
SELECT TripName, CountryName FROM Trip WHERE StartDate > STR_TO_DATE("4/30/2022", "%m/%d/%Y");

-- Query 5: List the first name, last name and birth date of all citizens of the USA. 
SELECT Passenger.FirstName, Passenger.LastName, Passport.BirthDate FROM Passenger INNER JOIN Passport ON Passport.PassengerID = Passenger.PassengerID WHERE Passport.PassengerID IN (SELECT PassengerID FROM Passport WHERE Country="USA");

-- Query 6: List the trip name and the number of seat available (Capacity of the assigned bus) for that trip for any trips starting between and including April 1, 2022 to Sept 1, 2022 (just check the starting dates, not the ending dates)
SELECT TripName, Capacity FROM Trip INNER JOIN Bus ON Trip.LicenceID = Bus.LicenceID WHERE StartDate > STR_TO_DATE("4/1/2022", "%m/%d/%Y") AND StartDate < STR_TO_DATE("9/1/2022", "%m/%d/%Y");

-- Query 7: List all the data for both the passport and the passenger for any passenger whose passport has expired or will expire within 1 year from the current date. (Google the MySQL command's CURDATE()  and ADDDATE() to help you make this work no matter what date it is today).
SELECT * FROM Passport INNER JOIN Passenger ON Passport.PassengerID = Passenger.PassengerID WHERE ExpiryDate BETWEEN CURDATE() AND ADDDATE(CURDATE(), INTERVAL 1 YEAR);

-- Query 8: List the first name, last name and bus trip name for any trips that anyone whose last name starts with S.
SELECT FirstName, LastName, TripName FROM Passenger INNER JOIN Books ON Passenger.PassengerID = Books.PassengerID INNER JOIN Trip ON Trip.TripID = Books.TripID WHERE LastName LIKE 'S%';

-- Query 9: Count the number of passengers taking the Castles of Germany trip. List that total number of passengers and the trip name and trip id. 
SELECT COUNT(PassengerID) as PassengerCount, TripName, Trip.TripID FROM Trip INNER JOIN Books ON Trip.TripID = Books.TripID WHERE TripName = "Castles of Germany" GROUP BY TripName, Trip.TripID;

-- Query 10: List the countries that have trips and total amount of dollars brought in for each country. Each country name should just show up once along with the total.
SELECT CountryName, SUM(Price) FROM Trip INNER JOIN Books ON Trip.TripID = Books.TripID GROUP BY CountryName;

-- Query 11: List the passengers first and last names, citizenship country and the trip name  and trip country name of any passengers taking trips in a country that they are NOT a citizen of.
SELECT FirstName, LastName, Country, TripName, CountryName FROM Passenger INNER JOIN Books ON Passenger.PassengerID = Books.PassengerID INNER JOIN Passport ON Books.PassengerID = Passport.PassengerID INNER JOIN Trip ON Trip.TripID = Books.TripID WHERE NOT Passport.Country = Trip.CountryName;

-- Query 12: List the bus trip id and  bus trip name of all bus trips that do not have any passengers yet. 
SELECT TripID, TripName FROM Trip WHERE TripID NOT IN (SELECT TripID FROM Books); 

-- Query 13: Figure out which passenger is paying the most amount of money to our company (i.e. spending the most money in total on our trips). 
-- If there is a tie for top amount, list all the passengers paying that amount. 
-- List the first name, last name, country of citizenship and the total amount of money that passenger is spending.   
-- You might want to write a helper view and then a query on that view. (HARD - without using a view this took me a while (but you can use a view)!)
CREATE VIEW TotalPay AS
SELECT FirstName, LastName, Country, SUM(Price) AS Cost FROM Passenger INNER JOIN Passport ON Passenger.PassengerID = Passport.PassengerID INNER JOIN Books ON Passenger.PassengerID = Books.PassengerID GROUP BY FirstName, LastName, Country;
SELECT FirstName, LastName, Country, Cost FROM TotalPay WHERE Cost = (SELECT MAX(Cost) FROM TotalPay) GROUP BY FirstName, LastName, Country, Cost;

-- Query 14: Find the names of any bus trips with bookings but with less than 4 people taking them. (Hint: you will have to use the key words Group By and Having)
SELECT TripName FROM Trip INNER JOIN Books ON Trip.TripID = Books.TripID GROUP BY TripName HAVING COUNT(PassengerID) < 4 ;

-- Query 15:  We want to make sure that bus trips have enough seats.  Write a query that figures out if any of the bus trips have too many passengers for the size of bus assigned to them.  
-- Display the trip name, the number of passengers booked on it and the capacity and license plate number for the bus.   
-- Write the query so that the columns have the following neat titles "Bus Trip Name", "Current Number of Passengers", "Current Bus Assigned License Plate", "Capacity of Assigned Bus".
SELECT TripName AS "Bus Trip Name", COUNT(PassengerID) AS "Current Number of Passengers", Capacity AS "Capacity of Assigned Bus", Trip.LicenceID AS "Current Bus Assigned License Plate" FROM Trip INNER JOIN Books ON Trip.TripID = Books.TripID INNER JOIN Bus ON Trip.LicenceID = Bus.LicenceID GROUP BY TripName, Capacity, Trip.LicenceID HAVING COUNT(PassengerID) > Capacity;