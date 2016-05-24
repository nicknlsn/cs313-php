select * from scriptures;

alter table scriptures 
alter column content varchar(500);

drop table scriptures;
create table scriptures ( id int AUTO_INCREMENT PRIMARY KEY, book VARCHAR(15), chapter INT, verse INT, content VARCHAR(500));
show tables;
explain scriptures;
describe scriptures;

insert into scriptures (book, chapter, verse, content) values ('Hebrews', '11', '1', 'Now faith is the substance of things hoped for, the evidence of things not seen.');
insert into scriptures (book, chapter, verse, content) values ('Enos', '1', '8', 'And he said unto me: Because of thy faith in Christ, whom thou hast never before heard nor seen. And many years pass away before he shall manifest himself in the flesh; wherefore, go to, thy faith hath made thee whole.');
insert into scriptures (book, chapter, verse, content) values ('Moroni', '7', '33', 'And Christ hath said: If ye will have faith in me ye shall have power to do whatsoever thing is expedient in me.');
insert into scriptures (book, chapter, verse, content) values ('Ether', '12', '19', 'And there were many whose faith was so exceedingly strong, even before Christ came, who could not be kept from within the veil, but truly saw with their eyes the things which they had beheld with an eye of faith, and they were glad.');

create user 'team@127.0.0.1' identified by 'TeamA';
GRANT INSERT, SELECT, UPDATE, DELETE ON scriptures.* TO 'team@127.0.0.1';