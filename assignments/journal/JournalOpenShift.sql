show databases;
show tables;

create table user (
  id int auto_increment primary key,
  username varchar(50),
  password varchar(100),
  emailAddress varchar(100),
  accountCreateDate date,
  dataUsed int,
  journalCount int,
  entryCount int
);
explain user;
--drop table user;

create table journal (
  id int auto_increment primary key, 
  userId int, 
  name varchar(20), 
  createDate date, 
  foreign key (userId) references user(id)
  );
explain journal;
--drop table journal;

create table entry (
  id int auto_increment primary key, 
  journalId int, 
  userId int, 
  createDate date, 
  text text, 
  foreign key (userId) references user(id), 
  foreign key (journalId) references journal(id)
  );
explain entry;
--drop table entry;

-- insert dummy data
insert into user (
