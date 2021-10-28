create table users
( id int unsigned not null auto_increment primary key,
    user_id char(10) not null,
  full_name char(50) not null,
  email char(50),
  hashed_pw char(32) not null,
  role enum('ADMIN', 'CUSTOMER')
);
create table movies
( id int unsigned not null auto_increment primary key,
  name char(50) not null,
  description varchar(255),
  poster_img LONGBLOB
);
create table schedule
( id int unsigned not null auto_increment primary key,
  movie_id int,
  date_time datetime(0),
  hall enum('A','B','C','D','E','F')
);

create table seats
( id int unsigned not null auto_increment primary key,
  schedule_id int,
  movie_id int,
  seat_row enum('A','B','C','D','E','F'),
  seat_col enum('1','2','3','4','5','6','7','8','9')
);

create table bookings {
    id int unsigned not null auto_increment primary key,
    seat_id int,
    user_id int
}







