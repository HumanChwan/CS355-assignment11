-- Name: Dinesh Chukkala
-- Roll: 2001CS22

CREATE DATABASE library_db11;
USE library_db11;

CREATE TABLE Student (
    stdID VARCHAR(10) primary key,
    passwd VARCHAR(255) NOT NULL,
    stdName VARCHAR(20) NOT NULL,
    DoJ DATE,
    age INTEGER,
    department VARCHAR(20) NOT NULL,
    mobileNo BIGINT,
    email VARCHAR(30) NOT NULL UNIQUE
);

INSERT INTO Student VALUES
    ("CS22", "supersecret", "Dinesh", "2002-12-23", 20, "CSE", 9898989812, "din@dines.com"),
    ("EE24", "secret", "Alex", "2002-12-23", 22, "EE", 9898989812, "alex@alex.com"),
    ("CS12", "sec", "Drona", "2002-12-23", 19, "CSE", 9898989812, "drone@drona.com"),
    ("ME02", "se", "Mooody", "2002-12-23", 21, "ME", 9898989812, "mooody@gov.in"),
    ("CB56", "super", "Jake", "2002-12-23", 23, "CBE", 9898989812, "jakepaul@iitp.ac.in");
