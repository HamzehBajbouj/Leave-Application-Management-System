CREATE DATABASE leavingApplcaiton;

USE leavingApplcaiton;


CREATE TABLE Admin(
    AdminID INT AUTO_INCREMENT  NOT NULL PRIMARY KEY ,

   FName VARCHAR(15),
   LName VARCHAR(15),
   sEmail VARCHAR(30),
   PhoneNumber INT, 
   A_UserName VARCHAR(30),
   A_Password VARCHAR(30)
);


CREATE TABLE Staff(
    StaffID INT AUTO_INCREMENT  NOT NULL PRIMARY KEY ,
	AdminID  INT NOT NULL,
   FName VARCHAR(15),
   LName VARCHAR(15),
   sEmail VARCHAR(30),
   PhoneNumber INT, 
   Department VARCHAR(15),
   St_UserName VARCHAR(30),
   St_Password VARCHAR(30),
	FOREIGN KEY(AdminID) REFERENCES Admin(AdminID)
);

CREATE TABLE Manager(
	StaffID INT NOT NULL,
	manager_ID INT NOT NULL,
	FOREIGN KEY(StaffID) REFERENCES Staff(StaffID),
	FOREIGN KEY(manager_ID) REFERENCES Staff(StaffID)
);

CREATE TABLE LeavingApplication(
    AppID INT AUTO_INCREMENT  NOT NULL PRIMARY KEY ,
	StaffID INT NOT NULL,

   RequestTime DATE,
   BeginingDate DATE,
   EndingDate DATE,
   leavingReason VARCHAR(50),
   applicationDescription VARCHAR(350),
   applicationStatus VARCHAR(20),
	FOREIGN KEY(StaffID) REFERENCES Staff(StaffID)
);


INSERT INTO Admin(FName ,LName,sEmail,PhoneNumber,A_UserName,A_Password)
VALUES ('Annie','Jack','Annie@gmail.com',011645454,'Annie','admin1'),
	('Adam','Water','Adam@gmail.com',01165354,'Adam','admin2');
	

INSERT INTO Staff(FName ,LName,sEmail,PhoneNumber,St_UserName,St_Password,AdminID)
VALUES ('Bobby','Wood','Bobby@gmail.com',01122254,'Bobby','manager1',(SELECT AdminID FROM Admin WHERE AdminID = 1)),
	('Beth','Wec','Beth@gmail.com',01122224,'Beth','manager2',(SELECT AdminID FROM Admin WHERE AdminID = 1)),
	('Chad','Wat','Chad@gmail.com',011232154,'Chad','staff1',(SELECT AdminID FROM Admin WHERE AdminID = 2)),
	('Cindy','Nar','Cindy@gmail.com',01112354,'Cindy','staff2',(SELECT AdminID FROM Admin WHERE AdminID = 1));

INSERT INTO Manager(manager_ID,StaffID)
VALUES ((SELECT StaffID FROM Staff WHERE StaffID = 1),(SELECT StaffID FROM Staff WHERE StaffID = 3)),
	((SELECT StaffID FROM Staff WHERE StaffID = 2),(SELECT StaffID FROM Staff WHERE StaffID = 4));
	