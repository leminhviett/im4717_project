create table product
( id int unsigned not null auto_increment primary key,
  name char(50) not null
);

create table price
( product_id int unsigned not null,
  type char(50) not null,
  price int unsigned not null
);

create table sales
(
  product_id int unsigned not null,
  quantity int unsigned not null,
  type char(50) not null,
  revenue int unsigned,
  date date not null
);

insert into product values
    (1, "Just Java"),
    (2, "Cafe"),
    (3, "Iced Capuchino");

insert into price values
    (1, "SING", 2),
    (2, "SING", 2),
    (2, "DOUB", 3),
    (3, "SING", 4.75),
    (3, "DOUB", 5.75);

insert into sales values
    (3, 100, 'DOUB',600, '2021-10-21'),
    (2, 90, 'DOUB',300, '2021-10-21'),
    (1, 60, 'SING',100, '2021-10-21'),
    (2, 80, 'SING',100, '2021-10-21'),
    (3, 150, 'DOUB',1000, '2021-10-21');

-- select sum(revenue), product_id, date from sales WHERE DATE(date) = CURDATE() group by product_id order by sum(revenue);
-- select sum(quantity), type as category from sales WHERE DATE(date) = CURDATE() group by type order by sum(quantity);
