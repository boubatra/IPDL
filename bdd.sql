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
    FOREIGN KEY (ID_surv) REFERENCES utilisateur(ID_user));

create table cours( ID_cours int primary key not null auto_increment,
    nom varchar(50),
    description varchar(50),
    date_debut date,
    date_fin date,
    volumeHoraire int,
    volumeHoraireRestant int,
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

create table emploi_du_temps( ID_emploi_du_temps int primary key not null auto_increment,
    ID_cours int,
    ID_salle int,
    ID_horaire int,
    FOREIGN KEY (ID_cours) REFERENCES cours(ID_cours),
    FOREIGN KEY (ID_salle) REFERENCES salle(ID_salle),
    FOREIGN KEY (ID_horaire) REFERENCES horaire(ID_horaire));

create table pointer ( ID_pointer int primary key not null auto_increment,
    ID_cours int,
    ID_classe int,
    ID_horaire int,
    FOREIGN KEY (ID_cours) REFERENCES cours(ID_cours),
    FOREIGN KEY (ID_classe) REFERENCES classe(ID_classe),
    FOREIGN KEY (ID_horaire) REFERENCES horaire(ID_horaire));


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



insert into utilisateur (username, email, password, profile, nom, prenom) values('admin', 'admin@admin.com', 'admin', 'admin', 'admin', 'admin');
insert into utilisateur (username, email, password, profile, nom, prenom) values('bass', 'bassirou.toure@esp.sn', 'bass', 'professeur', 'Bassirou', 'TOURE');
insert into utilisateur (username, email, password, profile, nom, prenom) values('toto', 'toto@toto.com', 'toto', 'etudiant', 'Toto', 'Toto');
insert into utilisateur (username, email, password, profile, nom, prenom) values('ndoye', 'ndoye.surveillant@esp.sn', 'ndoye', 'surveillant', 'Ndoye', 'Surveillant');

insert into professeur(ID_user) values(2);
insert into etudiant(ID_user) values(3);
insert into surveillant(ID_user) values(4);


insert into horaire values(1, '08:00:00', '10:00:00', 1);
insert into horaire values(2, '10:00:00', '12:00:00', 1);
insert into horaire values(3, '12:00:00', '14:30:00', 1);
insert into horaire values(4, '14:30:00', '16:30:00', 1);
insert into horaire values(5, '16:30:00', '18:30:00', 1);

insert into liste_horaire values(1, 1);
insert into liste_horaire values(2, 2);
insert into liste_horaire values(3, 3);
insert into liste_horaire values(4, 4);
insert into liste_horaire values(5, 5);

insert into cours(nom, description, date_debut, date_fin, volumeHoraire,volumeHoraireRestant, ID_prof) values('Modelisation', 'Cours 1', '2020-01-01', '2020-02-01', 30,18, 1);
insert into cours(nom, description, date_debut, date_fin, volumeHoraire,volumeHoraireRestant, ID_prof) values('Programmation', 'Cours 2', '2020-03-01', '2020-04-01', 20,20, 1);
insert into cours(nom, description, date_debut, date_fin, volumeHoraire,volumeHoraireRestant, ID_prof) values('Base de données', 'Cours 3', '2020-05-01', '2020-06-01', 24,4, 1);
insert into cours(nom, description, date_debut, date_fin, volumeHoraire,volumeHoraireRestant, ID_prof) values('Reseau', 'Cours 4', '2020-07-01', '2020-08-01', 56,48, 1);

insert into classe(nom, ID_prof) values('Master 1 GLSI', 1);
insert into classe(nom, ID_prof) values('Master 2 GLSI', 1);
insert into classe(nom, ID_prof) values('LICENCE 3 GLSI', 1);

insert into salle (nom, capacite, ID_prof) values('Salle 1', 20, 1);
insert into salle (nom, capacite, ID_prof) values('Salle 2', 30, 1);
insert into salle (nom, capacite, ID_prof) values('Salle 3', 40, 1);

insert into liste_etudiant values(1, 1);

insert into liste_cours values(1, 1);
insert into liste_cours values(2, 2);
insert into liste_cours values(3, 3);
insert into liste_cours values(4, 4);

insert into liste_professeur values(1, 1);

insert into liste_classe values(1, 1);
insert into liste_classe values(2, 1);
insert into liste_classe values(3, 1);

insert into emploi_du_temps (ID_cours, ID_salle, ID_horaire) values(1, 1, 1);
insert into emploi_du_temps (ID_cours, ID_salle, ID_horaire) values(2, 2, 2);
insert into emploi_du_temps (ID_cours, ID_salle, ID_horaire) values(3, 3, 3);

insert into pointer (ID_cours, ID_classe) values(1, 1);
insert into pointer (ID_cours, ID_classe) values(2, 2);
insert into pointer (ID_cours, ID_classe) values(3, 3);
