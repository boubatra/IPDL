drop database  ipdl;
create or replace database  ipdl;
use ipdl;
create table utilisateur( ID_user int primary key not null auto_increment,
    username varchar(50),
    email varchar(50),
    password varchar(50),
    profile varchar(50),
    photo varchar(100),
    nom varchar(50),
    prenom varchar(50));

create table professeur( ID_prof int primary key not null auto_increment,
    ID_user int,
    FOREIGN KEY (ID_user) REFERENCES utilisateur(ID_user));
create table etudiant( ID_etud int primary key not null auto_increment,
    ID_user int,
    FOREIGN KEY (ID_user) REFERENCES utilisateur(ID_user));
create table surveillant( ID_surv int primary key not null auto_increment,
    ID_user int,
    FOREIGN KEY (ID_surv) REFERENCES utilisateur(ID_surv));

create table cours( ID_cours int primary key not null auto_increment,
    nom varchar(50),
    description varchar(50),
    date_debut date,
    date_fin date,
    ID_prof int,
    FOREIGN KEY (ID_prof) REFERENCES professeur(ID_prof));

create table classe ( ID_classe int primary key not null auto_increment,
    nom varchar(50),
    ID_prof int,
    FOREIGN KEY (ID_prof) REFERENCES professeur(ID_prof));

create table salle ( ID_salle int primary key not null auto_increment,
    nom varchar(50),
    capacite int,
    ID_prof int,
    FOREIGN KEY (ID_prof) REFERENCES professeur(ID_prof));

create table horaire ( ID_horaire int primary key not null auto_increment,
    heure_debut time,
    heure_fin time,
    ID_prof int,
    FOREIGN KEY (ID_prof) REFERENCES professeur(ID_prof));

create table absence ( ID_absence int primary key not null auto_increment,
    ID_etud int,
    ID_cours int,
    FOREIGN KEY (ID_etud) REFERENCES etudiant(ID_etud),
    FOREIGN KEY (ID_cours) REFERENCES cours(ID_cours));

create emploi_du_temps( ID_emploi_du_temps int primary key not null auto_increment,
    ID_cours int,
    ID_salle int,
    ID_horaire int,
    FOREIGN KEY (ID_cours) REFERENCES cours(ID_cours),
    FOREIGN KEY (ID_salle) REFERENCES salle(ID_salle),
    FOREIGN KEY (ID_horaire) REFERENCES horaire(ID_horaire));

create table pointer ( ID_pointer int primary key not null auto_increment,
    ID_cours int,
    ID_classe int,
    FOREIGN KEY (ID_cours) REFERENCES cours(ID_cours),
    FOREIGN KEY (ID_classe) REFERENCES classe(ID_classe));

create table liste_absence ( ID_liste_absence int primary key not null auto_increment,
    ID_absence int,
    FOREIGN KEY (ID_absence) REFERENCES absence(ID_absence));

create table liste_etudiant ( ID_liste_etudiant int primary key not null auto_increment,
    ID_etud int,
    FOREIGN KEY (ID_etud) REFERENCES etudiant(ID_etud));

create table liste_cours ( ID_liste_cours int primary key not null auto_increment,
    ID_cours int,
    FOREIGN KEY (ID_cours) REFERENCES cours(ID_cours));

create table liste_professeur ( ID_liste_professeur int primary key not null auto_increment,
    ID_prof int,
    FOREIGN KEY (ID_prof) REFERENCES professeur(ID_prof));

create table liste_classe ( ID_liste_classe int primary key not null auto_increment,
    ID_classe int,
    FOREIGN KEY (ID_classe) REFERENCES classe(ID_classe));

create table liste_salle ( ID_liste_salle int primary key not null auto_increment,
    ID_salle int,
    FOREIGN KEY (ID_salle) REFERENCES salle(ID_salle));

create table liste_horaire ( ID_liste_horaire int primary key not null auto_increment,
    ID_horaire int,
    FOREIGN KEY (ID_horaire) REFERENCES horaire(ID_horaire));












