CREATE TABLE patient (
Patient_ID int(20) PRIMARY KEY,
First_Name VARCHAR(20) NOT NULL,
Last_Name VARCHAR(15) NOT NULL,
Gender ENUM("MALE", "FEMALE") not null,
Phone_no int(10) NOT NULL,
P_DOB DATE NOT NULL,
Address varchar(250) NOT NULL
);


ALTER TABLE patient
  MODIFY Patient_ID int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


insert into patient values (1,'ibrar','babar','Male',13364,'1972-06-15','Alraheem_Garden');
insert into patient values (2,'Asjid','Tahir','Male',58952,'2000-05-17','Town Ship');
insert into patient values (3,'Noman','Siddique','Male',23153,'2001-04-19','Mansera');
insert into patient values (4,'Fariha','Ahmad','Female',22421,'2009-05-18','Gujrawala');

/*-----------------------------*/

CREATE TABLE Doctor (
Doctor_ID int(20) PRIMARY KEY,
First_Name VARCHAR(20) NOT NULL,
Last_Name VARCHAR(15) NOT NULL,
Gender ENUM("MALE", "FEMALE") not null,
Phone_no int(10) NOT NULL,
Doctor_specializarion varchar(30) not null
);

ALTER TABLE Doctor
  MODIFY Doctor_ID int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


insert into Doctor values (11,'Dr Bilal','Sikandar','Male',665364,'Surgical');
insert into Doctor values (12,'Dr Muzamil','Ahmad','Male',987656,'Heart');
insert into Doctor values (13,'Dr Maham','Khan','Female',589647,'Gyna');
insert into Doctor values (14,'Dr Munir','Rehman','Male',586952,'Emergency');

/*-----------------------------*/


----------------------------------------------------------------------
update patient set Address = 'Town Ship' where First_Name = 'Asjid'; 


 drop table doctor;
 drop table Patient;

