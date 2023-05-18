create sequence idmarque;
create sequence idprocesseur;
create sequence idram;
create sequence idecran;
create sequence iddisque_dur;
create sequence idlaptop;
create sequence idtransfert_magasin;
create sequence idtransfert_point_vente;
create sequence idrecu_point_vente;
create sequence idrecu_magasin;
create sequence idpoint_vente;
create sequence idutilisateur;


create table marque(idmarque char(6) primary key default concat('MA00',nextval('idmarque')),marque char(50));

create table processeur(idprocesseur char(6) primary key default concat('PR00',nextval('idprocesseur')),
idmarque char(6),
caracteristique char(50),
foreign key(idmarque) references marque(idmarque));

create table ram(idram char(6) primary key default concat('RA00',nextval('idram')),
frequence int,
capacite int);

create table ecran(idecran char(6) primary key default  concat('EC00',nextval('idecran')),
caracteristique char(50),
frequence int);

create table disque_dur(iddisque_dur char(6) primary key default concat('DD00',nextval('iddisque_dur')),
idmarque char(6),
frequence int,
foreign key(idmarque) references marque(idmarque));

create table laptop(idlaptop char(6) primary key default concat('LA00',nextval('idlaptop')),
idmarque char(6),
idprocesseur char(6),
idram char(6),
idecran char(6),
iddisque_dur char(6),
reference char(6),
prix_achat int,
foreign key(idmarque)  references marque(idmarque),
foreign key(idprocesseur) references processeur(idprocesseur),
foreign key(idram) references ram(idram),
foreign key(idecran) references ecran(idecran),
foreign key(iddisque_dur) references disque_dur(iddisque_dur));

create table historique_entree_magasin(idlaptop char(6),
quantite int,
date_entree timestamp default current_timestamp,
foreign key(idlaptop) references laptop(idlaptop));

create table utilisateur(idutilisateur char(6) primary key default concat('U00',nextval('idutilisateur')),
nom char(50),
prenom char(50),
age int,
email char(50),
mdp char(50));

create table point_vente(idpoint_vente char(6) primary key default concat('PV00',nextval('idpoint_vente')),
emplacement char(50),
nom char(50));

create table utilisateur_point_vente(idutilisateur char(6),
idpoint_vente char(6),
foreign key(idutilisateur) references utilisateur(idutilisateur),
foreign key(idpoint_vente) references point_vente(idpoint_vente));

create table stock_point_vente(idlaptop char(6),idpoint_vente char(6),
quantite int,
foreign key(idlaptop) references laptop(idlaptop),
foreign key(idpoint_vente) references point_vente(idpoint_vente));

create table stock_magasin(idlaptop char(6),
quantite int,
prix_vente int,
foreign key(idlaptop) references laptop(idlaptop));

create table transfert_magasin(idtransfert_magasin char(6) primary key default concat('TM00',nextval('idtransfert_magasin')),
idpoint_vente char(6),
idlaptop char(6),
date_transfert timestamp default current_timestamp,
quantite int,
foreign key(idlaptop) references laptop(idlaptop),
foreign key(idpoint_vente) references point_vente(idpoint_vente));

create table transfert_point_vente(idtransfert_point_vente char(6) primary key default concat('TP00',nextval('idtransfert_point_vente')),
idpoint_vente char(6),
idlaptop char(6),
date_transfert timestamp default current_timestamp,
quantite int,
foreign key(idlaptop) references laptop(idlaptop),
foreign key(idpoint_vente) references point_vente(idpoint_vente));

create table recu_magasin(idrecu_magasin char(6) primary key default concat('RM00',nextval('idrecu_magasin')),
idtransfert_magasin char(6),
quantite_recu int,
foreign key(idtransfert_magasin) references transfert_magasin(idtransfert_magasin));

create table recu_point_vente(idrecu_point_vente char(6) primary key default  concat('RP00',nextval('idrecu_point_vente')),
idtransfert_point_vente char(6),
quantite_recu int,
foreign key(idtransfert_point_vente) references transfert_point_vente(idtransfert_point_vente));


create table vente(idlaptop char(6),idpoint_vente char(6),
date_vente timestamp default current_timestamp,
quantite int,
foreign key(idlaptop) references laptop(idlaptop),
foreign key(idpoint_vente) references point_vente(idpoint_vente));

create table historique_perte(
    idlaptop char(6),
    idpoint_vente char(6),
    quantite int,
    date_perte timestamp default current_timestamp,
    foreign key(idlaptop) references laptop(idlaptop),
    foreign key(idpoint_vente) references point_vente(idpoint_vente)
);

create view laptop_marque as select laptop.*,marque.marque as laptop_marque from laptop,marque where laptop.idmarque = marque.idmarque;

create view processeur_marque as select processeur.*,marque.marque as processeur_marque from marque,processeur where processeur.idmarque = marque.idmarque;

create view laptop_marque_processeur as select laptop_marque.*,processeur_marque.caracteristique,processeur_marque.caracteristique as caracteristique_marque from laptop_marque,processeur_marque where laptop_marque.idprocesseur = processeur_marque.idprocesseur;

create view  laptop_marque_processeur_ram as select laptop_marque_processeur.*,ram.capacite,ram.frequence from laptop_marque_processeur,ram where laptop_marque_processeur.idram = ram.idram;

create view laptop_marque_processeur_ram_ecran as select laptop_marque_processeur_ram.*,ecran.caracteristique as caracteristique_ecran,ecran.frequence as frequence_ecran from laptop_marque_processeur_ram,ecran where laptop_marque_processeur_ram.idecran= ecran.idecran;

create view disque_dur_marque as select disque_dur.*,marque.marque as disque_dur_marque from disque_dur,marque where disque_dur.idmarque = marque.idmarque;

create view laptop_composant as select laptop_marque_processeur_ram_ecran.*,disque_dur_marque.disque_dur_marque,disque_dur_marque.capacite as capacite_disque_dur from laptop_marque_processeur_ram_ecran,disque_dur_marque where laptop_marque_processeur_ram_ecran.iddisque_dur = disque_dur_marque.iddisque_dur;

create view laptop_composant_prix_vente as select laptop_composant.*,stock_magasin.prix_vente from laptop_composant,stock_magasin where laptop_composant.idlaptop = stock_magasin.idlaptop;