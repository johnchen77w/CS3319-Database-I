-- Connect to (use) that database
USE 66_assign2db;

-- Load bus table
SELECT * from Bus;
LOAD DATA LOCAL INFILE "/home/centos/wchen466/assn2/wchen466/loaddatafall2021.txt" INTO TABle Bus FIELDS TERMINATED BY ",";
SELECT * from Bus;

-- Load Passenger table
SELECT * from Passenger;
INSERT INTO Passenger VALUES (11, "Homer", "Simpson");
INSERT INTO Passenger VALUES (22, "Marge", "Simpson");
INSERT INTO Passenger VALUES (33, "Bart", "Simpson");
INSERT INTO Passenger VALUES (34, "Lisa", "Simpson");
INSERT INTO Passenger VALUES (35, "Maggie", "Simpson");
INSERT INTO Passenger VALUES (44, "Ned", "Flanders");
INSERT INTO Passenger VALUES (45, "Todd", "Flanders");
INSERT INTO Passenger VALUES (66, "Heidi", "Klum");
INSERT INTO Passenger VALUES (77, "Michael", "Scott");
INSERT INTO Passenger VALUES (78, "Dwight", "Schrute");
INSERT INTO Passenger VALUES (79, "Pam", "Beesly");
INSERT INTO Passenger VALUES (80, "Creed", "Bratton");
INSERT INTO Passenger VALUES (90, "James", "Bond");
SELECT * from Passenger;

-- Load Passport table
SELECT * from Passport;
INSERT INTO Passport VALUES ("US10", "USA", STR_TO_DATE("1/1/2025", "%m/%d/%Y"), STR_TO_DATE("2/19/1970", "%m/%d/%Y"), 11);
INSERT INTO Passport VALUES ("US12", "USA", STR_TO_DATE("1/1/2025", "%m/%d/%Y"), STR_TO_DATE("8/12/1972", "%m/%d/%Y"), 22);
INSERT INTO Passport VALUES ("US13", "USA", STR_TO_DATE("1/1/2025", "%m/%d/%Y"), STR_TO_DATE("5/12/2001", "%m/%d/%Y"), 33);
INSERT INTO Passport VALUES ("US14", "USA", STR_TO_DATE("1/1/2025", "%m/%d/%Y"), STR_TO_DATE("3/19/2004", "%m/%d/%Y"), 34);
INSERT INTO Passport VALUES ("US15", "USA", STR_TO_DATE("1/1/2025", "%m/%d/%Y"), STR_TO_DATE("9/17/2012", "%m/%d/%Y"), 35);
INSERT INTO Passport VALUES ("US22", "USA", STR_TO_DATE("4/4/2030", "%m/%d/%Y"), STR_TO_DATE("6/11/1950", "%m/%d/%Y"), 44);
INSERT INTO Passport VALUES ("US23", "USA", STR_TO_DATE("3/3/2018", "%m/%d/%Y"), STR_TO_DATE("6/24/1940", "%m/%d/%Y"), 45);
INSERT INTO Passport VALUES ("GE11", "Germany", STR_TO_DATE("1/1/2027", "%m/%d/%Y"), STR_TO_DATE("7/12/1970", "%m/%d/%Y"), 66);
INSERT INTO Passport VALUES ("US88", "Canada", STR_TO_DATE("2/13/2030", "%m/%d/%Y"), STR_TO_DATE("4/25/1979", "%m/%d/%Y"), 77);
INSERT INTO Passport VALUES ("US89", "Canada", STR_TO_DATE("2/2/2022", "%m/%d/%Y"), STR_TO_DATE("4/8/1976", "%m/%d/%Y"), 78);
INSERT INTO Passport VALUES ("US90", "Italy", STR_TO_DATE("2/28/2020", "%m/%d/%Y"), STR_TO_DATE("4/4/1980", "%m/%d/%Y"), 79);
INSERT INTO Passport VALUES ("US91", "Germany", STR_TO_DATE("1/1/2030", "%m/%d/%Y"), STR_TO_DATE("2/2/1959", "%m/%d/%Y"), 80);
INSERT INTO Passport VALUES ("UK07", "UK", STR_TO_DATE("1/1/2030", "%m/%d/%Y"), STR_TO_DATE("3/2/1968", "%m/%d/%Y"), 90);
SELECT * from Passport;

-- Load Trip table
SELECT * from Trip;
INSERT INTO Trip VALUES (1, "Castles of Germany", STR_TO_DATE("1/1/2022", "%m/%d/%Y"), STR_TO_DATE("1/17/2022", "%m/%d/%Y"), "Germany", "VAN1111");
INSERT INTO Trip VALUES (2, "Tuscany Sunsets", STR_TO_DATE("3/3/2022", "%m/%d/%Y"), STR_TO_DATE("3/14/2022", "%m/%d/%Y"), "Italy", "TAXI222");
INSERT INTO Trip VALUES (3, "California Wines", STR_TO_DATE("5/5/2022", "%m/%d/%Y"), STR_TO_DATE("5/10/2022", "%m/%d/%Y"), "USA", "VAN2222");
INSERT INTO Trip VALUES (4, "Beaches Galore", STR_TO_DATE("4/4/2022", "%m/%d/%Y"), STR_TO_DATE("4/14/2022", "%m/%d/%Y"), "Bermuda", "TAXI222");
INSERT INTO Trip VALUES (5, "Cottage Country", STR_TO_DATE("6/1/2022", "%m/%d/%Y"), STR_TO_DATE("6/22/2022", "%m/%d/%Y"), "Canada", "CAND123");
INSERT INTO Trip VALUES (6, "Arrivaderci Roma", STR_TO_DATE("7/5/2022", "%m/%d/%Y"), STR_TO_DATE("7/15/2022", "%m/%d/%Y"), "Italy", "TAXI111");
INSERT INTO Trip VALUES (7, "Shetland and Orkney", STR_TO_DATE("9/9/2022", "%m/%d/%Y"), STR_TO_DATE("9/29/2022", "%m/%d/%Y"), "UK", "TAXI111");
INSERT INTO Trip VALUES (8, "Disney World and Sea World", STR_TO_DATE("6/10/2022", "%m/%d/%Y"), STR_TO_DATE("6/20/2022", "%m/%d/%Y"), "USA", "VAN2222");
INSERT INTO Trip VALUES (9, "Monaco Paddock Club", STR_TO_DATE("4/26/2022", "%m/%d/%Y"), STR_TO_DATE("4/29/2022", "%m/%d/%Y"), "MONACO", "CAND123");
INSERT INTO Trip VALUES (10, "HAAS Factory Tour", STR_TO_DATE("6/10/2022", "%m/%d/%Y"), STR_TO_DATE("6/5/2022", "%m/%d/%Y"), "USA", "VAN2222");
SELECT * from Trip;

-- Load Books table
SELECT * from Books;
INSERT INTO Books VALUES (1, 11, 500.00);
INSERT INTO Books VALUES (1, 22, 500.00);
INSERT INTO Books VALUES (1, 33, 200.00);
INSERT INTO Books VALUES (1, 34, 200.00);
INSERT INTO Books VALUES (1, 35, 200.00);
INSERT INTO Books VALUES (1, 66, 600.99);
INSERT INTO Books VALUES (8, 44, 400.00);
INSERT INTO Books VALUES (8, 45, 200.00);
INSERT INTO Books VALUES (4, 78, 600.00);
INSERT INTO Books VALUES (4, 80, 600.00);
INSERT INTO Books VALUES (1, 78, 550.00);
INSERT INTO Books VALUES (8, 33, 300.00);
INSERT INTO Books VALUES (8, 34, 300.00);
INSERT INTO Books VALUES (6, 11, 600.00);
INSERT INTO Books VALUES (6, 22, 600.00);
INSERT INTO Books VALUES (6, 33, 100.00);
INSERT INTO Books VALUES (6, 34, 100.00);
INSERT INTO Books VALUES (6, 35, 100.00);
INSERT INTO Books VALUES (7, 11, 300.00);
INSERT INTO Books VALUES (7, 44, 400.00);
INSERT INTO Books VALUES (7, 77, 500.00);
INSERT INTO Books VALUES (10, 90, 999.99);
SELECT * from Books;

-- Change the country of passport for Dwight Schrute to be Germany rather than Canada. Use the first and last name to change the value (so you must join to the passenger table, so not just eyeball Dwight's passport number). 
SELECT * from Passport;
UPDATE Passport SET Country="Germany" WHERE PassengerID IN (SELECT PassengerID FROM Passenger WHERE FirstName="Dwight");
SELECT * from Passport;

-- Change any trip that is from the USA to use VAN1111
SELECT * from Trip;
UPDATE Trip SET LicenceID="VAN1111" WHERE CountryName="USA";
SELECT * from Trip;