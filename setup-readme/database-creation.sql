create table registered(
    pri_key PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) not null unique,
    streetaddr VARCHAR(255) not null,
    city VARCHAR(255) not null,
    state VARCHAR(255) not null,
    zipcode VARCHAR(255) not null,
    contact VARCHAR(255) not null,
    date date not null default current_timestamp,
    kgs int(5) not null,
    collection int(1) not null,
    assistance int(1) not null,
    recyclable int(1) not null
);