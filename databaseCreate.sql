-- REMOVE FILE BEFORE GOING LIVE
CREATE DATABASE CareerReadyIOM;

CREATE TABLE news (
    id int NOT NULL AUTO_INCREMENT,
    authorId int NOT NULL,
    title nvarchar(50) NOT NULL,
    body nvarchar(255) NOT NULL,
    image nvarchar(10),
    -- Keys
    PRIMARY KEY (id),
    FOREIGN KEY (authorId) REFERENCES accounts(id)

);

CREATE TABLE accounts (
    id int NOT NULL AUTO_INCREMENT,
    firstName nvarchar(35) NOT NULL,
    lastName nvarchar(35) NOT NULL,
    password nvarchar(60) NOT NULL,
    email nvarchar(255) NOT NULL,
    accountType nvarchar(7) NOT NULL,
    joinYear int,
    region nvarchar(7),
    workOrSchool nvarchar(100),
    -- Keys
    PRIMARY KEY (id)
);

CREATE TABLE meetings (
    id int NOT NULL AUTO_INCREMENT,
    title nvarchar(50) NOT NULL,
    body nvarchar(255) NOT NULL,
    image nvarchar(10),
    dateAndTime datetime NOT NULL,
    duration int NOT NULL,
    meetingType nchar(1) NOT NULL,
    organiserId int NOT NULL,
    -- Keys
    PRIMARY KEY (id),
    FOREIGN KEY (organiserId) REFERENCES accounts(id)
);

CREATE TABLE resources (
    id int NOT NULL AUTO_INCREMENT,
    title nvarchar(50) NOT NULL,
    description nvarchar(255) NOT NULL,
    location nvarchar(50) NOT NULL,
    ownerId int NOT NULL,
    -- Keys
    PRIMARY KEY (id),
    FOREIGN KEY (ownerId) REFERENCES accounts(id)
);
