CREATE TABLE Families(
    FamilyId INT PRIMARY KEY NOT NULL,
    FamilyName CHAR(20),
    PWord CHAR(20)
);
CREATE TABLE People(
    PersonId INT PRIMARY KEY NOT NULL,
    PersonName CHAR(20)
);
CREATE TABLE Appointments(
    AppointmentId INT PRIMARY KEY NOT NULL,
    AppointmentName CHAR(20),
    AppointmentStart TIME,
    AppointmentEnd TIME,
    AppointmentDate DATE
);
CREATE TABLE DeadLines(
    DeadLineId INT PRIMARY KEY NOT NULL,
    DeadLineName CHAR(20),
    DeadLineTime TIME,
    DeadLineDate DATE
);
CREATE TABLE FamilyPerson(
    FamilyId INT,
    PersonId INT,
    PRIMARY KEY(FamilyId,PersonId)
);
CREATE TABLE PersonAppointment(
    PersonId INT,
    AppointmentId INT,
    PRIMARY KEY(PersonID,AppointmentId)
);
CREATE TABLE PersonDeadLine(
    PersonId INT,
    DeadLineId INT,
    PRIMARY KEY(PersonID,DeadLineId)
);
INSERT INTO Families
VALUES (0,'Smith','12345');
INSERT INTO Families
VALUES (1,'McArthur','password');
INSERT INTO People
VALUES (0,'James');
INSERT INTO People
VALUES (1,'Bob');
INSERT INTO Appointments
VALUES (0,'Dentist','14:30:00','15:00:00','20200821');
INSERT INTO Appointments
VALUES (1,'Doctor','14:30:00','15:00:00','20200804');
INSERT INTO Appointments
VALUES (2,'Meeting','14:30:00','15:00:00','20200806');
INSERT INTO Appointments
VALUES (3,'Conference','14:30:00','15:00:00','20200906');
INSERT INTO DeadLines
VALUES (0,'Homework','15:00:00','20200821');
INSERT INTO DeadLines
VALUES (1,'Taxes','15:00:00','20200813');
INSERT INTO DeadLines
VALUES (2,'Coursework','15:00:00','20200807');
INSERT INTO DeadLines
VALUES (3,'Delivery','15:00:00','20200909');
INSERT INTO FamilyPerson
VALUES (0,0);
INSERT INTO FamilyPerson
VALUES (0,1);
INSERT INTO PersonAppointment
VALUES (0,0);
INSERT INTO PersonAppointment
VALUES (0,1);
INSERT INTO PersonAppointment
VALUES (1,2);
INSERT INTO PersonAppointment
VALUES (0,3);
INSERT INTO PersonDeadLine
VALUES (0,0);
INSERT INTO PersonDeadLine
VALUES (0,1);
INSERT INTO PersonDeadLine
VALUES (1,2);
INSERT INTO PersonDeadLine
VALUES (0,3);