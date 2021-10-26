-- List all the current databases owned by you
SHOW DATABASES;
-- Delete the database called last2digitsofyourstudentnumber_assign2db if it exists
DROP DATABASE IF EXISTS 66_assign2db;
-- Create a database called last2digitsofyourstudentnumber_assign2db
CREATE DATABASE 66_assign2db;
-- Connect to (use) that database
USE 66_assign2db;
-- List all the tables (should be none initially)
SHOW TABLES;
-- Create the tables you need to solve the problem above with the appropriate types and keys, foreign keys.  Make sure that:
    -- you create the foreign keys (this may force you to create the tables in a certain order in order to indicate the foreign keys)
    -- when you delete a bustrip, cause an error to occur if the bustrip still has any bookings so that you can return the passengers money.  
    -- If you delete a passenger make sure that any bookings that passenger has gets deleted also and 
        -- that the associated passport get deleted as well.  (HINT: Google CASCADE for the delete command)
CREATE TABLE Passenger(PassengerID int NOT NULL,
                       FirstName VARCHAR (20) NOT NULL,
                       LastName VARCHAR (20) NOT NULL,
                       PRIMARY KEY (PassengerID));

CREATE TABLE Bus(LicenceID VARCHAR (7) NOT NULL,
                 Capacity int NOT NULL,
                 PRIMARY KEY (LicenceID));

CREATE TABLE Trip(TripID int NOT NULL,
                  TripName VARCHAR (50) NOT NULL,
                  StartDate date NOT NULL,
                  EndDate date NOT NULL,
                  CountryName VARCHAR (30) NOT NULL,
                  LicenceID VARCHAR (7) NOT NULL,
                  PRIMARY KEY (TripID),
                  FOREIGN KEY (LicenceID) REFERENCES Bus (LicenceID));

CREATE TABLE Passport(PassportID VARCHAR(4) NOT NULL,
                      Country VARCHAR(30) NOT NULL,
                      ExpiryDate date NOT NULL,
                      BirthDate date NOT NULL,
                      PassengerID int NOT NULL,
                      PRIMARY KEY (PassportID),
                      FOREIGN KEY (PassengerID) REFERENCES Passenger (PassengerID) ON DELETE CASCADE);

CREATE TABLE Books(TripID int NOT NULL,
                   PassengerID int NOT NULL,
                   Price float NOT NULL,
                   PRIMARY KEY (TripID, PassengerID),
                   FOREIGN KEY (TripID) REFERENCES Trip (TripID),
                   FOREIGN KEY (PassengerID) REFERENCES Passport (PassengerID) ON DELETE CASCADE);
-- List the tables again
SHOW TABLES;