create table Project(
    idProject int primary key auto_increment,
    mail varchar(40) not null,
    name varchar(50) not null,
    startDate date not null,
    description text,
    endDate date not null,
    rate float,
    stats varchar(20) not null,
    classe varchar(10) not null,
    support varchar(20),
    type varchar(20),
    day date,
    location varchar(50),
    foreign key(mail) references Artist(mail)
    );