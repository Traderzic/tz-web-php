CREATE TABLE IF NOT EXISTS Project (
  idProject int(11) NOT NULL AUTO_INCREMENT,
  mail varchar(40) NOT NULL,
  name varchar(50) NOT NULL,
  startDate date NOT NULL,
  description text,
  endDate date NOT NULL,
  rate float DEFAULT NULL,
  stats varchar(20) NOT NULL,
  classe varchar(10) NOT NULL,
  support varchar(20) DEFAULT NULL,
  type varchar(20) DEFAULT NULL,
  day date DEFAULT NULL,
  location varchar(50) DEFAULT NULL,
  PRIMARY KEY (idProject),
  KEY mail (mail)
);

ALTER TABLE Project ADD CONSTRAINT Project_cntrt FOREIGN KEY (mail) REFERENCES Artist (mail);