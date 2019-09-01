Drop Table if exists challan;
Drop Table if exists vehicle;
Drop Table if exists E_User;
Drop Table if exists license;
Drop Table if exists area;


Create table Area
(
	Area_code int AUTO_INCREMENT ,
	Area_Name varchar(25),
	District varchar(25),
	City varchar(25),
	PRIMARY KEY (Area_code)
);

Create table E_User
(
	User_ID int AUTO_INCREMENT,
	User_Name varchar(25) not null,
	Password varchar(25) not null,
	Area_code int,
	PhoneNumber varchar(25),
	E_mail varchar(25) not null,
	Status varchar(25) not null,
	PRIMARY KEY (User_ID),
	FOREIGN KEY (Area_Code) REFERENCES Area(Area_code)
    
);

Create table License
(
	License_No int AUTO_INCREMENT,
	User_ID int,
    License_Status varchar(10),
    Type varchar(10),
	Issue_Date date,
	Due_Date date,
	PRIMARY KEY (License_No),
	FOREIGN KEY (User_ID) REFERENCES E_User(User_ID)
    ON DELETE CASCADE
);

Create table Vehicle
(
	Vehicle_No varchar(25),
	User_ID int,
	Model int not null,
	Type varchar(25),
	PRIMARY KEY (Vehicle_No),
	FOREIGN KEY (User_ID) REFERENCES E_User(User_ID) 
    ON DELETE CASCADE
);

Create table Challan
(
	Challan_No int AUTO_INCREMENT,
	Amount int not null,
	Issue_Date date not null,
	Due_Date date not null,
	User_ID int not null,
	Vehicle_No varchar(25) not null,
    `Status` varchar(25) not null,
	PRIMARY KEY (Challan_No),
	FOREIGN KEY (User_ID) REFERENCES E_User(User_ID) ON DELETE CASCADE,
	FOREIGN KEY (Vehicle_No) REFERENCES Vehicle(Vehicle_No) ON DELETE CASCADE
);
























