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
alter table user modify username varchar(50) not null;
alter table user modify password varchar(100) not null;
alter table user modify emailAddress varchar(100) not null;
alter table user modify accountCreateDate date not null;
explain user;

create table journal (
  id int auto_increment primary key, 
  userId int, 
  name varchar(20), 
  createDate date, 
  foreign key (userId) references user(id)
  );
alter table journal modify userId int not null;
alter table journal modify name varchar(20) not null;
alter table journal modify createDate date not null;
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
alter table entry modify journalId int not null;
alter table entry modify createDate date not null;
alter table entry modify text text not null;
alter table entry drop column userId;
alter table entry drop foreign key entry_ibfk_1;
alter table entry rename column text to entryText;
explain entry;
describe entry;
--drop table entry;


insert into user (username, password, emailAddress, accountCreateDate) 
values ('normanLevy', 'hardPassword', 'normanLevy1290@gmail.com', '2016-05-17');
insert into user (username, password, emailAddress, accountCreateDate) 
values ('darthvader', 'joinTheDarkside', 'notsureiwanttosignuphere@gmail.com', '2016-05-23');

insert into journal (userId, name, createDate) 
values (1, 'My First Journal', '2016-05-17');
insert into journal (userId, name, createDate) 
values (1, 'Reflective Journal', '2016-05-23');
insert into journal (userId, name, createDate) 
values (1, 'School Notes', '2016-05-23');
insert into journal (userId, name, createDate) 
values (2, 'The Dark Side Rules', '2016-05-23');

insert into entry (journalId, userId, createDate, text) 
values (1, 1, '2016-05-17', 'This is the first entry!');
insert into entry (journalId, userId, createDate, text) 
values (1, 1, '2016-05-17', 'This is another entry into the journal named My First Journal whose journalId is 1.');
insert into entry (journalId, createDate, text) 
values (1, '2016-05-28', 'Today I did some improvements to the database. I got constraints set up so things cannot be null, and I also deleted a column from the entry table to reduce the risk of having corrupted data.');
insert into entry (journalId, userId, createDate, text) 
values (2, 1, '2016-05-17', 'This is the first entry for the Reflective Journal!');
insert into entry (journalId, userId, createDate, text) 
values (3, 1, '2016-05-17', 'This is the first entry for the school journal!');
insert into entry (journalId, userId, createDate, text) 
values (4, 2, '2016-05-23', 'This is my journal about how the dark side rules. If anyone reads this without my permission they will be force choked.');
insert into entry (journalId, userId, createDate, text) 
values (4, 2, '2016-05-24', 'Today I finally told Luke I was his father. It did not go over well. I knew it was going to be awkward. I freaking cut off his hand! Gosh dangit! Why did it have to be so awkward!');

select * from user;
select * from user where id = 2;
select password, id, username, emailAddress from user where emailAddress='notsureiwanttosignuphere@gmail.com';
select password, id, username, emailAddress from user where emailAddress='badaddress@gmail.com';
select * from journal;
select * from journal where userId=2;
select * from journal where id=4;
select * from entry;
select * from entry where userId = 1;
select * from entry where journalId=4;
select journal.id from journal join entry on entry.createDate where userId=2;

-- how to make these two queries into one?
select id from journal where userId=2;
select createDate from entry where journalId=4 order by createDate desc;
-- like this?
select entry.createDate from entry left join journal on journal.id=entry.journalId where journal.userId=2 order by entry.createDate desc; -- i think like this! wait
select distinct journal.id, journal.name from journal left join entry on entry.journalId=journal.id where journal.userId=1 order by entry.createDate desc; -- neat
SELECT DISTINCT journal.id, journal.name FROM journal LEFT JOIN entry ON entry.journalId=journal.id WHERE journal.userId=1 ORDER BY entry.createDate DESC;
select * from journal left join entry on entry.journalId=journal.id where journal.userId=1 order by entry.createDate desc limit 1; -- like this
select * from journal left join entry on entry.journalId=journal.id where journal.userId=1; -- like this

select * from entry where userId = 2 order by createDate desc limit 1;

select * from user where username="normanLevy" and password="hardPassword";