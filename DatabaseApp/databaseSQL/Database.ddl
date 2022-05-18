-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue May  3 18:12:37 2022 
-- * LUN file: Z:\home\riccardo\Scrivania\Uni\Anno2\Database\Progetto\DATABASE PROJECT.lun 
-- * Schema: SCHEMARELAZIONALETABELLARE/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database FACTORY;
use FACTORY;


-- Tables Section
-- _____________ 

create table CAMIONISTI (
     Matricola int not null,
     CodiceFiscale varchar(15) not null,
     Nome varchar(15) not null,
     Cognome varchar(15) not null,
     Telefono varchar(15) not null,
     Salario int not null,
     Città varchar(15) not null,
     Via varchar(15) not null,
     NumeroCivico int not null,
     constraint IDCAMIONISTA primary key (Matricola));

create table CLIENTI (
     PartitaIva varchar(15) not null,
     Nome varchar(15) not null,
     Telefono varchar(15) not null,
     Città varchar(15) not null,
     Via varchar(15) not null,
     NumeroCivico int not null,
     constraint IDCLIENTE primary key (PartitaIva));

create table FORNITORI (
     PartitaIva varchar(15) not null,
     Nome varchar(15) not null,
     Telefono int not null,
     Città varchar(15) not null,
     Via varchar(15) not null,
     NumeroCivico int not null,
     constraint IDFORNITORE primary key (PartitaIva));

create table forniture (
     LottoMateriale varchar(15) not null,
     PartitaIva varchar(15) not null,
     Quantita int not null,
     Prezzo int not null,
     Data date not null,
     constraint IDfornitura primary key (PartitaIva, LottoMateriale));

create table LAVORAZIONI (
     LottoLavorazione varchar(15) not null,
     Ora int not null,
     Data date not null,
     LottoProdotto varchar(15) not null,
     Targa varchar(15) not null,
     Tipo varchar(15) not null,
     Descrizione varchar(15) not null,
     constraint IDLAVORAZIONE primary key (LottoLavorazione),
     constraint IDLAVORAZIONE_1 unique (Targa, LottoProdotto, Ora, Data));

create table MACCHINARI (
     Targa varchar(15) not null,
     Nome varchar(15) not null,
     Tipo varchar(15) not null,
     NumeroGomme int,
     constraint IDMACCHINARIO primary key (Targa));

create table MATERIALI (
     LottoMateriale varchar(15) not null,
     Nome varchar(15) not null,
     Misura varchar(15) not null,
     Quantità int not null,
     IdTipo char(15) not null,
     constraint IDMATERIALE_ID primary key (LottoMateriale));

create table necessità (
     LottoLavorazione varchar(15) not null,
     LottoMateriale varchar(15) not null,
     Quantità int not null,
     constraint IDnecessità primary key (LottoLavorazione, LottoMateriale));

create table OPERAI (
     Matricola int not null,
     CodiceFiscale char(15) not null,
     Nome varchar(15) not null,
     Cognome varchar(15) not null,
     Telefono varchar(15) not null,
     Salario int not null,
     Città varchar(15) not null,
     Via varchar(15) not null,
     NumeroCivico int not null,
     constraint IDDIPENDENTE primary key (Matricola));

create table ORDINI (
     NumeroOrdine int not null,
     Data date not null,
     Descrizione varchar(15) not null,
     Stato varchar(15) not null,
     CostoTotale int,
     PartitaIva varchar(15) not null,
     constraint IDORDINE primary key (NumeroOrdine));

create table PRODOTTI_LAVORATI (
     LottoProdotto varchar(15) not null,
     Tipo varchar(15) not null,
     PesoComplessivo int not null,
     PesoPerElemento int not null,
     NumeroElementi int not null,
     Lunghezza int,
     NumeroOrdine int,
     constraint IDPRODOTTO_LAVORATO_ID primary key (LottoProdotto));

create table PRODUZIONI (
     Matricola int not null,
     OraInizio int not null,
     OraFine int,
     Data date not null,
     Targa varchar(15) not null,
     constraint IDPRODUZIONE primary key (Matricola, OraInizio, Data),
     constraint IDPRODUZIONE_1 unique (Targa, OraInizio, Data));

create table REVISIONI (
     Targa varchar(15) not null,
     Data date not null,
     Ora int not null,
     Descrizione varchar(15) not null,
     Costo int not null,
     constraint IDREVISIONE primary key (Targa, Data));

create table spedizioni (
     NumeroOrdine int not null,
     Data date not null,
     Matricola int not null,
     constraint FKspe_ORD_ID primary key (NumeroOrdine));

create table TIPI_MATERIALE (
     IdTipo int not null,
     Nome varchar(15) not null,
     constraint IDTIPO_MATERIALE primary key (IdTipo));


-- Constraints Section
-- ___________________ 

alter table forniture add constraint FKfor_FOR
     foreign key (PartitaIva)
     references FORNITORI (PartitaIva);

alter table forniture add constraint FKfor_MAT
     foreign key (LottoMateriale)
     references MATERIALI (LottoMateriale);

alter table LAVORAZIONI add constraint FKrealizzazione
     foreign key (LottoProdotto)
     references PRODOTTI_LAVORATI (LottoProdotto);

alter table LAVORAZIONI add constraint FKesecuzione
     foreign key (Targa)
     references MACCHINARI (Targa);

-- Not implemented
-- alter table MATERIALI add constraint IDMATERIALE_CHK
--     check(exists(select * from forniture
--                  where forniture.LottoMateriale = LottoMateriale)); 

alter table MATERIALI add constraint FKcategoria
     foreign key (IdTipo)
     references TIPI_MATERIALE (IdTipo);

alter table necessità add constraint FKnec_MAT
     foreign key (LottoMateriale)
     references MATERIALI (LottoMateriale);

alter table necessità add constraint FKnec_LAV
     foreign key (LottoLavorazione)
     references LAVORAZIONI (LottoLavorazione);

alter table ORDINI add constraint FKeffettuazione
     foreign key (PartitaIva)
     references CLIENTI (PartitaIva);

-- Not implemented
-- alter table PRODOTTI_LAVORATI add constraint IDPRODOTTO_LAVORATO_CHK
--     check(exists(select * from LAVORAZIONI
--                  where LAVORAZIONI.LottoProdotto = LottoProdotto)); 

alter table PRODOTTI_LAVORATI add constraint FKriferimento
     foreign key (NumeroOrdine)
     references ORDINI (NumeroOrdine);

alter table PRODUZIONI add constraint FKuso
     foreign key (Targa)
     references MACCHINARI (Targa);

alter table PRODUZIONI add constraint FKoccupazione
     foreign key (Matricola)
     references OPERAI (Matricola);

alter table REVISIONI add constraint FKattuazione
     foreign key (Targa)
     references MACCHINARI (Targa);

alter table spedizioni add constraint FKspe_ORD_FK
     foreign key (NumeroOrdine)
     references ORDINI (NumeroOrdine);

alter table spedizioni add constraint FKspe_CAM
     foreign key (Matricola)
     references CAMIONISTI (Matricola);


-- Index Section
-- _____________ 

