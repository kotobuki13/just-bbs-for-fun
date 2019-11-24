create database bbs_db;

create user dbuser@localhost identified by 'zaq123';
grant all privileges on bbs_db.* to 'dbuser'@'localhost';

use bbs_db

create table posts (
  id int not null auto_increment primary key,
  u_name varchar(10),
  context varchar(150),
  created datetime
);

desc posts;