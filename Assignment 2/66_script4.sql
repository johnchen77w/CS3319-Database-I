-- Connect to (use) that database
USE 66_assign2db;

-- Create a view that shows the first name, last name, trip name, trip country and trip price for every passenger who taking a trip. 
CREATE VIEW MyView AS
SELECT FirstName, LastName, TripName, CountryName, Price FROM Passenger INNER JOIN Books ON Passenger.PassengerID = Books.PassengerID INNER JOIN Trip ON Trip.TripID = Books.TripID;

-- Prove that your view works by selecting all the rows from it.
SELECT * FROM MyView;

-- Run your view again but this time just select all the columns from the view but only the rows where the trip has a trip name that will take you to a place involving "Castles" . 
-- Order the rows in ascending order by the price the passengers paid starting at the lowest price.  
SELECT * FROM MyView WHERE TripName LIKE "%Castles%" ORDER BY Price;

-- Show all the bus table information
SELECT * FROM Bus;

-- Delete any bus whose license plate contains "UWO" in it.
DELETE FROM Bus WHERE LicenceID LIKE '%UWO%';

-- Show all the bus information again to make sure it was remove
SELECT * FROM Bus;

-- Show all the data from passport table
SELECT * FROM Passport;

-- Show all the data from the passenger table
SELECT * FROM Passenger;

-- Delete all the passport from Canada
DELETE FROM Passport WHERE Country = "Canada";

-- Show all the data from passport table
SELECT * FROM Passport;

-- Show all the data from the passenger table
SELECT * FROM Passenger;

-- Put a comment (-- the reason why ...) in your script file to explain which tables were affected and why
-- Since the Passport has PassengerID as a foreign key, deleting someone's passport will not delete this person in the Passenger table.

-- Show everything in the bustrip table. 
SELECT * FROM Trip;

-- Delete the California Wines trip
DELETE FROM Trip WHERE TripName = "California Wines";

-- Show everything in the bustrip table again to make sure it was deleted.
SELECT * FROM Trip;

-- Try to delete the Arrivaderci Roma trip
DELETE FROM Trip WHERE TripName = "Arrivaderci Roma";

-- Put a comment ( -- reason why ..) in your script file to explain why this trip could not be deleted.
-- Cannot delete or update a parent row: a foreign key constraint fails (`66_assign2db`.`Books`, CONSTRAINT `Books_ibfk_1` FOREIGN KEY (`TripID`) REFERENCES `Trip` (`TripID`))

-- Show everything in the passenger table
SELECT * FROM Passenger;

-- Delete anyone with the first name Pam
DELETE FROM Passenger WHERE FirstName = "Pam";

-- Show everything in passenger table again to make sure she was deleted.
SELECT * FROM Passenger;

-- Select everything from the view your created for this fourth script from the passenger table (you cannot delete from views, they just display data but don't actually hold the data)
SELECT * FROM MyView;

-- Delete anyone with the last name Simpson.
DELETE FROM Passenger WHERE LastName = "Simpson";

-- Select everything from that view again and make sure the bookings for the Simpsons disappeared when they were deleted.
SELECT * FROM MyView;