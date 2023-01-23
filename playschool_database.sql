DROP DATABASE IF EXISTS playschool;
CREATE DATABASE playschool;
USE playschool;

DROP TABLE IF EXISTS Parent;
CREATE TABLE Parent(
	pIC CHAR(12),
    pName VARCHAR(50) NOT NULL,
    pPassword VARCHAR(30) NOT NULL,
    pAddress VARCHAR(50) NOT NULL,
    pCity VARCHAR(20) NOT NULL,
    pPostCode DECIMAL(5) NOT NULL,
    pState VARCHAR(20) NOT NULL,
    pOccupation VARCHAR(20) NOT NULL,
    pEmail VARCHAR(30),
    pRegStatus BOOLEAN NOT NULL, -- 0 for nonregistered and 1 for registered
    CONSTRAINT parent_pk PRIMARY KEY(pIC)
);

DROP TABLE IF EXISTS pPhone;
CREATE TABLE pPhone(

	phone DECIMAL(15),
    pIC CHAR(12) NOT NULL,
    
    CONSTRAINT pPhone_pk PRIMARY KEY(phone)
);

DROP TABLE IF EXISTS Student;
CREATE TABLE Student(

	stdMKN CHAR(12),
    stdName VARCHAR(50) NOT NULL,
    stdGender BOOLEAN NOT NULL, -- 0 for female and 1 for male //
    stdAge DECIMAL(2) NOT NULL,
    stdDOB DATE NOT NULL, -- CHECK
    stdFavorColor VARCHAR(20),
    stdDiapers BOOLEAN NOT NULL, -- 0 for no and 1 for yes //
    stdSession VARCHAR(2) NOT NULL, -- M for morning, A for afternoon and MA for morning afternoon //
    stdMeal VARCHAR(2) NOT NULL, -- M for morning, A for afternoon and MA for morning afternoon, N for No//
    stdPhoto VARCHAR(40) NOT NULL,
    stdRegStatus BOOLEAN NOT NULL, -- 0 for nonregistered and 1 for registered
    pIC CHAR(12) NOT NULL, 
    clsName VARCHAR(20) , 

    CONSTRAINT Student_pk PRIMARY KEY(stdMKN)
);

DROP TABLE IF EXISTS stdAllergy;
CREATE TABLE stdAllergy(

	stdMKN CHAR(12),
    allergy VARCHAR(50),
    
	CONSTRAINT stdAllergy_pk PRIMARY KEY(stdMKN, allergy)
);

DROP TABLE IF EXISTS stdFavorFood;
CREATE TABLE stdFavorFood(

	stdMKN CHAR(12),
    food VARCHAR(20),
    
    CONSTRAINT stdFavorFood_pk PRIMARY KEY(stdMKN, food)
);

DROP TABLE IF EXISTS stdFavorToy;
CREATE TABLE stdFavorToy(

	stdMKN CHAR(12),
    toy VARCHAR(20),
    
	CONSTRAINT stdFavorToy_pk PRIMARY KEY(stdMKN, toy)
);

DROP TABLE IF EXISTS Teacher;
CREATE TABLE Teacher(

	tIC CHAR(12),
    tName VARCHAR(50) NOT NULL,
    tPassword VARCHAR(30) NOT NULL,
    tEPF DECIMAL(10) NOT NULL, 
    tBank VARCHAR(50) NOT NULL, 
    tBankAccount INT(20) NOT NULL,
    tPhone DECIMAL(15) NOT NULL,
    tAddress VARCHAR(50) NOT NULL,
    tCity VARCHAR(20) NOT NULL,
    tPostcode DECIMAL(5) NOT NULL,
    tState VARCHAR(20) NOT NULL,
    tEmail VARCHAR(30),
    tBasicSalpHour DECIMAL(8, 2) NOT NULL, 
    tOTSalpHour DECIMAL(8, 2) NOT NULL,
    tPhoto VARCHAR(40) NOT NULL,
    tPosition VARCHAR(10),
    CONSTRAINT Teacher_pk PRIMARY KEY(tIC)
);

DROP TABLE IF EXISTS Class;
CREATE TABLE Class(

	clsName VARCHAR(20),
    tIC CHAR(12) ,
    prgName VARCHAR(20) ,
    
    CONSTRAINT Class_pk PRIMARY KEY(clsName)
);

DROP TABLE IF EXISTS Program;
CREATE TABLE Program(

	prgName VARCHAR(20) NOT NULL, 
    prgDesc VARCHAR(255) NOT NULL, 
    CONSTRAINT Program_pk PRIMARY KEY(prgName)
);

DROP TABLE IF EXISTS RegApp;
CREATE TABLE RegApp(

	rID INT AUTO_INCREMENT,
    tIC CHAR(12) ,
    stdMKN CHAR(12) NOT NULL,
    rTime TIMESTAMP NOT NULL,
    
    CONSTRAINT RegApp_pk PRIMARY KEY(rID)
);

DROP TABLE IF EXISTS Fee;
CREATE TABLE Fee(

	fID INT AUTO_INCREMENT,
    fDate DATE NOT NULL, 
    fDesc VARCHAR(255),
    fTot DECIMAL(8, 2) NOT NULL,
    stdMKN CHAR(10) NOT NULL,
    payDate TIMESTAMP, 
    CONSTRAINT Fee_pk PRIMARY KEY(fID)
);

DROP TABLE IF EXISTS StdCovid;
CREATE TABLE StdCovid(

	csDate DATE ,
    stdMKN CHAR(12),
    csStatus BOOLEAN NOT NULL DEFAULT 0, -- 0 for no covid and 1 for get covid 
    CONSTRAINT stdCovid_pk PRIMARY KEY(csDate, stdMKN)
    
);

DROP TABLE IF EXISTS AttendanceStd;
CREATE TABLE AttendanceStd(

	attDate DATE ,    
    stdMKN CHAR(12),
    attReason VARCHAR(255),
    attTemparature DECIMAL(3, 1) NOT NULL,
    CONSTRAINT AttendanceStd_pk PRIMARY KEY(attDate, stdMKN)
);

DROP TABLE IF EXISTS AttendanceTeac;
CREATE TABLE AttendanceTeac(
	attDate DATE , 
    tIC CHAR(12) ,
    attReason VARCHAR(255),
    attTemparature DECIMAL(3, 1) NOT NULL,
    CONSTRAINT AttendanceTeac_pk PRIMARY KEY(attDate, tIC)
);

DROP TABLE IF EXISTS PrgSyllabus;
CREATE TABLE PrgSyllabus(
	
	prgsItem VARCHAR(20), 
    prgsFee DECIMAL(8, 2) NOT NULL,
    prgsDesc VARCHAR(80) NOT NULL,
    CONSTRAINT PrgSyllabus_pk PRIMARY KEY(prgsItem)
);

DROP TABLE IF EXISTS prgInclude;
CREATE TABLE PrgInclude(

	prgsItem VARCHAR(20) ,     
    prgName VARCHAR(20) , 
    CONSTRAINT prgInclude_pk PRIMARY KEY(prgsItem, prgName)
);

DROP TABLE IF EXISTS Performance;
CREATE TABLE Performance(
	
    performanceID INT AUTO_INCREMENT,
	stdMKN CHAR(12) ,
    spPeriod DEC(30) ,
    spYear INT(2) , 
    spDate DATE NOT NULL, 
    CONSTRAINT Performance_pk PRIMARY KEY(performanceID)
);

DROP TABLE IF EXISTS PerformType;
CREATE TABLE PerformType(
	
	ptName VARCHAR(20) ,
    ptDesc VARCHAR(255) NOT NULL, 
    CONSTRAINT PerformType_pk PRIMARY KEY(ptName)
);

DROP TABLE IF EXISTS PrgPerform;
CREATE TABLE PrgPerform(

	ptName VARCHAR(20) ,
    prgName VARCHAR(20) ,
    CONSTRAINT PrgPerform_pk PRIMARY KEY(ptName, prgName)
);

DROP TABLE IF EXISTS PerformBased;
CREATE TABLE PerformBased(

	pIName VARCHAR(20) ,
    ptName VARCHAR(20) NOT NULL,
    CONSTRAINT PerformBased_pk PRIMARY KEY(pIName)
);

DROP TABLE IF EXISTS PerformRating;
CREATE TABLE PerformRating(

	performanceID INT ,
    sbjPerID INT,
    pIDesc VARCHAR(255),
	ratingID INT NOT NULL,
    CONSTRAINT PerformRating_pk PRIMARY KEY(performanceID, sbjPerID)
);

DROP TABLE IF EXISTS Rating;
CREATE TABLE Rating(
	
    ratingID INT AUTO_INCREMENT,
    rCategory VARCHAR(20),
    
    CONSTRAINT Rating_pk PRIMARY KEY(ratingID)
);

DROP TABLE IF EXISTS SbjPerformance;
CREATE TABLE SbjPerformance(
	
    sbjPerID INT AUTO_INCREMENT,
    sbjName VARCHAR(20) NOT NULL,
    evalType VARCHAR(20) NOT NULL,
    
    CONSTRAINT SbjPerformance_pk PRIMARY KEY(sbjPerID)
);

DROP TABLE IF EXISTS PerformComment;
CREATE TABLE PerformComment(

	performanceID INT,
	iPerID INT,
    pcComment VARCHAR(255) NOT NULL, 
    CONSTRAINT PerformRating_pk PRIMARY KEY(performanceID, iPerID)
);

DROP TABLE IF EXISTS IndexPerformance;
CREATE TABLE IndexPerformance(
	
    iPerID INT AUTO_INCREMENT,
    iName VARCHAR(20) NOT NULL,
    iType VARCHAR(20) NOT NULL,
	
    CONSTRAINT IndexPerformance_pk PRIMARY KEY(iPerID)
);

DROP TABLE IF EXISTS Announcement;
CREATE TABLE Announcement(

	annID INT AUTO_INCREMENT,
    annDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    annText TEXT(10000) NOT NULL, 
    annType BOOL NOT NULL DEFAULT 0,
    tIC CHAR(12) ,
    CONSTRAINT Announcement_pk PRIMARY KEY(annID)
);

DROP TABLE IF EXISTS PicAnn;
CREATE TABLE PicAnn(
	
    picId INT AUTO_INCREMENT,
    annPic VARCHAR(100) NOT NULL,
    annID INT NOT NULL,
    
    CONSTRAINT PicAnn PRIMARY KEY(picId)
);

DROP TABLE IF EXISTS Activity;
CREATE TABLE Activity(

	actID INT NOT NULL AUTO_INCREMENT,
    actDate DATE NOT NULL, 
    actDesc TEXT(10000) NOT NULL, 
    tIC CHAR(12) ,
    CONSTRAINT Activity_pk PRIMARY KEY(actID)
);

DROP TABLE IF EXISTS PicAct;
CREATE TABLE PicAct(
	
    picId INT AUTO_INCREMENT,
    actPic VARCHAR(100) NOT NULL,
    actID INT NOT NULL,
    
    CONSTRAINT PicAct PRIMARY KEY(picID)
);

DROP TABLE IF EXISTS Salary;
CREATE TABLE Salary(
	
    salID INT AUTO_INCREMENT,
	tIC CHAR(12) NOT NULL,
    salDate DATE NOT NULL,
    salOthour INT NOT NULL,
    salAttendance INT NOT NULL,
    salReplacement INT NOT NULL,
    salAllowance DECIMAL(8, 2) NOT NULL,
    salEpf DECIMAL(8, 2) NOT NULL,
    salTotSalary DECIMAL(8, 2) NOT NULL,
    CONSTRAINT Salary_pk PRIMARY KEY(salID)
);

DROP TABLE IF EXISTS Food;
CREATE TABLE Food(

	fItem VARCHAR(20) NOT NULL,
    fPrice DECIMAL(8, 2) NOT NULL,
    CONSTRAINT Food_pk PRIMARY KEY(fItem)
);

DROP TABLE IF EXISTS Orders;
CREATE TABLE Orders(

	orderID INT AUTO_INCREMENT,
	fItem VARCHAR(20) ,
    tIC CHAR(12) ,
    oDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    oQuantity DEC(3) NOT NULL,
    CONSTRAINT Orders_pk PRIMARY KEY(orderID)
);

DROP TABLE IF EXISTS Subjects;
CREATE TABLE Subjects(
	
    sbjName VARCHAR(20),
    
    CONSTRAINT Subjects_pk PRIMARY KEY(sbjName)
);

DROP TABLE IF EXISTS SubjectsTeac;
CREATE TABLE SubjectsTeac(

	sbjName VARCHAR(20) ,
    tIC CHAR(12) ,
    CONSTRAINT SubjectsTeac_pk PRIMARY KEY(sbjName, tIC)
);

ALTER TABLE pPhone 
ADD CONSTRAINT pphone_pIC_fk FOREIGN KEY(pIC) REFERENCES Parent(pIC) ON UPDATE CASCADE ON DELETE CASCADE; 

ALTER TABLE Student
ADD CONSTRAINT stdSession_ck CHECK(stdSession IN ("M", "A", "MA")),
ADD CONSTRAINT stdMeal_ck CHECK(stdMeal IN ("M", "A", "MA")),
ADD CONSTRAINT Student_pIC_fk FOREIGN KEY(pIC) REFERENCES Parent(pIC) ON UPDATE CASCADE ON DELETE CASCADE,
ADD CONSTRAINT Student_clsName FOREIGN KEY(clsName) REFERENCES Class(clsName) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE stdAllergy
ADD CONSTRAINT stdAllergy_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE stdFavorFood
ADD CONSTRAINT stdFavorFood_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE stdFavorToy
ADD CONSTRAINT stdFavorToy_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Class
ADD CONSTRAINT Class_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE SET NULL,
ADD CONSTRAINT Class_prgName_fk FOREIGN KEY(prgName) REFERENCES Program(prgName) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE RegApp
ADD CONSTRAINT RegApp_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE SET NULL,
ADD CONSTRAINT RegApp_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE FEE
ADD CONSTRAINT Fee_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE StdCovid
ADD CONSTRAINT StdCovid_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE AttendanceStd
ADD CONSTRAINT AttendanceStd_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE AttendanceTeac
ADD CONSTRAINT AttendanceTeac_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE PrgInclude
ADD CONSTRAINT PrgInclude_prgsItem_fk FOREIGN KEY(prgsItem) REFERENCES PrgSyllabus(prgsItem) ON UPDATE CASCADE ON DELETE CASCADE,
ADD CONSTRAINT PrgInclude_fk FOREIGN KEY(prgName) REFERENCES Program(prgName) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Performance
ADD CONSTRAINT Performance_stdMKN_fk FOREIGN KEY(stdMKN) REFERENCES Student(stdMKN) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE PrgPerform
ADD CONSTRAINT PrgPerform_ptName_fk FOREIGN KEY(ptName) REFERENCES PerformType(ptName) ON UPDATE CASCADE ON DELETE CASCADE,
ADD CONSTRAINT PrgPerform_prgName_fk FOREIGN KEY(prgName) REFERENCES Program(prgName) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE PerformBased
ADD CONSTRAINT PerformBased_ptName_fk FOREIGN KEY(ptName) REFERENCES PerformType(ptName) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE PerformRating
ADD CONSTRAINT PerformRating_sbjPerID_fk FOREIGN KEY(sbjPerID) REFERENCES SbjPerformance(sbjPerID) ON UPDATE CASCADE ON DELETE RESTRICT,
ADD CONSTRAINT PerformRating_ratingID_fk FOREIGN KEY(ratingID) REFERENCES Rating(ratingID) ON UPDATE CASCADE ON DELETE RESTRICT,
ADD CONSTRAINT PerformRating_performanceID_fk FOREIGN KEY(performanceID) REFERENCES Performance(performanceID) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE SbjPerformance
ADD CONSTRAINT SbjPerformance_sbjName_fk FOREIGN KEY (sbjName) REFERENCES Subjects(sbjName) ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE PerformComment  
ADD CONSTRAINT PerformComment_iPerID_fk FOREIGN KEY(iPerID) REFERENCES IndexPerformance(iPerID) ON UPDATE CASCADE ON DELETE RESTRICT,
ADD CONSTRAINT PerformComment_performanceID_fk FOREIGN KEY(performanceID) REFERENCES Performance(performanceID) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Announcement
ADD CONSTRAINT Annoucement_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE Activity
ADD CONSTRAINT Activity_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE Salary
ADD CONSTRAINT Salary_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE Orders
ADD CONSTRAINT Orders_fItem_fk FOREIGN KEY(fItem) REFERENCES Food(fItem) ON UPDATE CASCADE ON DELETE SET NULL,
ADD CONSTRAINT Orders_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE SubjectsTeac
ADD CONSTRAINT SubjectsTeac_sbjName_fk FOREIGN KEY(sbjName) REFERENCES Subjects(sbjName) ON UPDATE CASCADE ON DELETE CASCADE,
ADD CONSTRAINT SubjectsTeac_tIC_fk FOREIGN KEY(tIC) REFERENCES Teacher(tIC) ON UPDATE CASCADE ON DELETE CASCADE;