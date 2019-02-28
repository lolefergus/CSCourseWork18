-- REMOVE FILE BEFORE GOING LIVE
CREATE DATABASE CareerReadyIOM;

CREATE TABLE news (
    id int NOT NULL IDENTITY PRIMARY KEY,
    authorId int NOT NULL FOREIGN KEY REFERENCES accounts(id),
    title nvarchar(50) NOT NULL,
    body nvarchar(255) NOT NULL,
    image nvarchar(10)
);

CREATE TABLE accounts (
    id int NOT NULL IDENTITY PRIMARY KEY,
    firstName nvarchar(35) NOT NULL,
    lastName nvarchar(35) NOT NULL,
    password nvarchar(60) NOT NULL,
    email nvarchar(255) NOT NULL,
    accountType nvarchar(7) NOT NULL,
    joinYear int,
    region nvarchar(7),
    workOrSchool nvarchar(100)
);

CREATE TABLE skillSurveyQs (
    qId int NOT NULL IDENTITY PRIMARY KEY,
    question nvarchar(200) NOT NULL,
    sectionId int NOT NULL FOREIGN KEY REFERENCES surveySection(surveyId)
);

CREATE TABLE surveySection (
    sectionId int NOT NULL IDENTITY PRIMARY KEY,
    title nvarchar(50) NOT NULL,
    description nvarchar(200) NOT NULL
);

CREATE TABLE skillSurveyAs (
    studentId int NOT NULL FOREIGN KEY REFERENCES accounts(id),
    surveyNo int NOT NULL PRIMARY KEY,
    qId int NOT NULL FOREIGN KEY REFERENCES skillSurveyQs(qId),
    dateCompleted date NOT NULL,
    answer int NOT NULL,

    primary key (studentId, surveyNo, qId)
);

CREATE TABLE meetings (
    id int NOT NULL IDENTITY PRIMARY KEY,
    title nvarchar(50) NOT NULL,
    body nvarchar(255) NOT NULL,
    image nvarchar(10),
    dateAndTime datetime NOT NULL,
    duration int NOT NULL,
    meetingType nchar(1) NOT NULL,
    organiserId int NOT NULL FOREIGN KEY REFERENCES accounts(id)
);

CREATE TABLE resources (
    id int NOT NULL IDENTITY PRIMARY KEY,
    title nvarchar(50) NOT NULL,
    description nvarchar(255) NOT NULL,
    location nvarchar(50) NOT NULL,
    ownerId int NOT NULL FOREIGN KEY REFERENCES accounts(id)
);
