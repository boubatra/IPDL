drop database  ipdl;
create or replace database  ipdl;
use ipdl;
create table professeur( ID_prof int primary key not null auto_increment,
 prenom varchar(50),
 nom varchar(50));
create table etudiant( ID_etu int primary key not null auto_increment,
 prenom varchar(50),
 nom varchar(50),
 filiere varchar(50));
create table surveillant( ID_sur int primary key not null auto_increment,
 prenom varchar(50),
 nom varchar(50),
 departement varchar(50));
create table classe( ID_classe int primary key not null auto_increment,
 nom varchar(50),
 niveau varchar(50),
 filiere varchar(50),
 departement varchar(50),
 nbr_etudiant int);
create table cours( ID_cours int primary key not null auto_increment,
id_prof int,
id_classe int,
foreign key (id_prof) references professeur(ID_prof),
foreign key (id_classe) references classe(ID_classe),
etat_cours boolean );

create table salle( ID_salle int primary key not null auto_increment,
departement varchar(50),
etat_salle boolean );

create table absence(etat boolean,
date date,
id_m int,
id_e int,
foreign key (id_m) references cours(ID_cours),
foreign key (id_e) references etudiant(ID_etu));










