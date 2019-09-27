create table ASISTENCIA
(
   ID_ASISTENCIA SERIAL not null,
   CODSIS_EST INT4 null,
   ID_SESION INT4 null,
   COMENTARIO_AUXI VARCHAR(500) null,
   constraint PK_ASISTENCIA primary key (ID_ASISTENCIA)
);

create unique index ASISTENCIA_PK on ASISTENCIA (
ID_ASISTENCIA
);

create  index RELATIONSHIP_29_FK on ASISTENCIA (
ID_SESION
);

create  index RELATIONSHIP_33_FK on ASISTENCIA (
CODSIS_EST
);

create table AUXILIARES
(
   ID_AUXILIAR SERIAL not null,
   NOMBRE VARCHAR(60) not null,
   APELLIDOS VARCHAR(60) null,
   SEXO CHAR(1) null,
   EMAIL VARCHAR(255) null,
   PASSWORD VARCHAR(255) null,
   CARGO VARCHAR(20) null,
   REMEMBER_TOKEN VARCHAR(100) null,
   constraint PK_AUXILIARES primary key (ID_AUXILIAR)
);

create unique index AUXILIARES_PK on AUXILIARES (
ID_AUXILIAR
);
-- /*==============================================================*/
-- /* Table: DIA_SEMANA                                            */
-- /*==============================================================*/
-- create table DIA_SEMANA (
--    DIA                  VARCHAR(25)          not null,
--    constraint PK_DIA_SEMANA primary key (DIA)
-- );

-- /*==============================================================*/
-- /* Index: DIA_SEMANA_PK                                         */
-- /*==============================================================*/
-- create unique index DIA_SEMANA_PK on DIA_SEMANA (
-- DIA
-- );

create table DOCENTES
(
   CODSIS_DOC NUMERIC not null,
   NOMBRE VARCHAR(60) not null,
   APELLIDOS VARCHAR(60) null,
   CI NUMERIC(10) null,
   TELEFONO NUMERIC(10) null,
   SEXO CHAR(1) null,
   EMAIL VARCHAR(255) null,
   PASSWORD VARCHAR(255) null,
   CARGO VARCHAR(20) null,
   ACTIVO BOOLEAN null,
   REMEMBER_TOKEN VARCHAR(100) null,
   constraint PK_DOCENTES primary key (CODSIS_DOC)
);

create unique index DOCENTES_PK on DOCENTES (
CODSIS_DOC
);

create table DOCENTES_MATERIAS
(
   ID_DOC_MAT SERIAL not null,
   COD_MATERIA VARCHAR(20) null,
   CODSIS_DOC NUMERIC null,
   constraint PK_DOCENTES_MATERIAS primary key (ID_DOC_MAT)
);

create unique index DOCENTES_MATERIAS_PK on DOCENTES_MATERIAS (
ID_DOC_MAT
);

create  index RELATIONSHIP_9_FK on DOCENTES_MATERIAS (
COD_MATERIA
);

create  index RELATIONSHIP_14_FK on DOCENTES_MATERIAS (
CODSIS_DOC
);

create table EJERCICIOS
(
   ID_EJERCICIO SERIAL not null,
   ID_SESION INT4 null,
   PATH_PDF VARCHAR(255) null,
   constraint PK_EJERCICIOS primary key (ID_EJERCICIO)
);

create unique index EJERCICIOS_PK on EJERCICIOS (
ID_EJERCICIO
);

create  index RELATIONSHIP_17_FK on EJERCICIOS (
ID_SESION
);

create table ESTUDIANTES
(
   CODSIS_EST INT4 not null,
   NOMBRE VARCHAR(60) not null,
   APELLIDOS VARCHAR(60) not null,
   CI NUMERIC null,
   SEXO CHAR(1) null,
   EMAIL VARCHAR(255) null,
   PASSWORD VARCHAR(255) null,
   CARGO VARCHAR(20) null,
   REMEMBER_TOKEN VARCHAR(100) null,
   constraint PK_ESTUDIANTES primary key (CODSIS_EST)
);

create unique index ESTUDIANTES_PK on ESTUDIANTES (
CODSIS_EST
);

create table GESTIONES
(
   COD_GESTION SERIAL not null,
   NOMBRE_GESTION VARCHAR(10) not null,
   constraint PK_GESTIONES primary key (COD_GESTION)
);

/*==============================================================*/
/* Index: GESTIONES_PK                                          */
/*==============================================================*/
create unique index GESTIONES_PK on GESTIONES (
COD_GESTION
);

create table GRUPOS
(
   NUMERO_GR NUMERIC not null,
   constraint PK_GRUPOS primary key (NUMERO_GR)
);

create unique index GRUPOS_PK on GRUPOS (
NUMERO_GR
);

create table GRUPO_LABORATORIO
(
   ID_GRUPO_LAB SERIAL not null,
   COD_MATERIA VARCHAR(20) null,
   CODSIS_DOC INTEGER null,
   ID_HORARIO INT4 null,
   COD_GESTION INTEGER null,
   NOMBRE_DOCENTE VARCHAR(60) null,
   NOMBRE_MATERIA VARCHAR(60) null,
   NOMBRE_AUXILIAR VARCHAR(60) null,
   NOMBRE_GESTION VARCHAR(20) null,
   HORA_INI VARCHAR(20) null,
   HORA_FIN VARCHAR(20) null,
   NUMERO_LAB NUMERIC null,
   DIA VARCHAR(25) null,
   NUMERO_GR NUMERIC null,
   constraint PK_GRUPO_LABORATORIO primary key (ID_GRUPO_LAB)
);

create unique index GRUPO_LABORATORIO_PK on GRUPO_LABORATORIO (
ID_GRUPO_LAB
);

create  index RELATIONSHIP_1_FK on GRUPO_LABORATORIO (
COD_MATERIA
);

create  index RELATIONSHIP_19_FK on GRUPO_LABORATORIO (
CODSIS_DOC
);

create  index RELATIONSHIP_11_FK on GRUPO_LABORATORIO (
NUMERO_LAB
);

create  index RELATIONSHIP_12_FK on GRUPO_LABORATORIO (
NUMERO_GR
);

create  index PERTENECE_FK on GRUPO_LABORATORIO (
ID_HORARIO
);

create  index PERTENECE_31_FK on GRUPO_LABORATORIO (
COD_GESTION
);

-- /*==============================================================*/
-- /* Index: POSEE_FK                                              */
-- /*==============================================================*/
-- create  index POSEE_FK on GRUPO_LABORATORIO (
-- GESTION
-- );

-- /*==============================================================*/
-- /* Index: RELATIONSHIP_27_FK                                    */
-- /*==============================================================*/
-- create  index RELATIONSHIP_27_FK on GRUPO_LABORATORIO (
-- DIA
-- );

create table HORARIOS
(
   ID_HORARIO SERIAL not null,
   HORA_INI VARCHAR(20) null,
   HORA_FIN VARCHAR(20) null,
   constraint PK_HORARIOS primary key (ID_HORARIO)
);

create unique index HORARIOS_PK on HORARIOS (
ID_HORARIO
);

create table LABORATORIOS
(
   NUMERO_LAB INT4 not null,
   CAPACIDAD INT4 null,
   constraint PK_LABORATORIOS primary key (NUMERO_LAB)
);

create unique index LABORATORIOS_PK on LABORATORIOS (
NUMERO_LAB
);

create table MATERIAS
(
   COD_MATERIA VARCHAR(20) not null,
   NOMBRE VARCHAR(100) null,
   DESCRIPCION VARCHAR(500) null,
   constraint PK_MATERIAS primary key (COD_MATERIA)
);

create unique index MATERIAS_PK on MATERIAS (
COD_MATERIA
);

create table NUM_SESION
(
   NUM_SESION INT4 not null
);

create table PORTAFOLIOS
(
   ID_PORTAFOLIO SERIAL not null,
   CODSIS_EST INT4 null,
   ID_EJERCICIO INT4 null,
   PATH_SOLUCION VARCHAR(255) null,
   CALIFICACION INT4 null,
   constraint PK_PORTAFOLIOS primary key (ID_PORTAFOLIO)
);

create unique index PORTAFOLIOS_PK on PORTAFOLIOS (
ID_PORTAFOLIO
);

create  index TIENEN_FK on PORTAFOLIOS (
CODSIS_EST
);

create  index SON_SOLUCIONES_DE_FK on PORTAFOLIOS (
ID_EJERCICIO
);

create table REGISTRO_AUX_LAB
(
   ID_REGIS SERIAL   not null,
   ID_AUXILIAR INT4  null,
   ID_GRUPO_LAB INT4 null,
   FECHA_REG         DATE null,
   constraint PK_REGISTRO_AUX_LAB primary key (ID_REGIS)
);

create unique index REGISTRO_AUX_LAB_PK on REGISTRO_AUX_LAB (
ID_REGIS
);

create  index RELATIONSHIP_41_FK on REGISTRO_AUX_LAB (
ID_AUXILIAR
);

create  index RELATIONSHIP_42_FK on REGISTRO_AUX_LAB (
ID_GRUPO_LAB
);

create table REGISTRO_EST_LAB
(
   ID_REG SERIAL not null,
   CODSIS_EST INT4 null,
   ID_GRUPO_LAB INT4 null,
   FECHA_REG DATE null,
   constraint PK_REGISTRO_EST_LAB primary key (ID_REG)
);

create unique index REGISTRO_EST_LAB_PK on REGISTRO_EST_LAB (
ID_REG
);

create  index RELATIONSHIP_22_FK on REGISTRO_EST_LAB (
CODSIS_EST
);

create  index RELATIONSHIP_23_FK on REGISTRO_EST_LAB (
ID_GRUPO_LAB
);

create table REGISTRO_EST_MAT
(
   ID_REGISTRO SERIAL not null,
   CODSIS_EST INT4 null,
   ID_DOC_MAT INT4 null,
   GESTION VARCHAR(10) null,
   constraint PK_REGISTRO_EST_MAT primary key (ID_REGISTRO)
);

create unique index REGISTRO_EST_MAT_PK on REGISTRO_EST_MAT (
ID_REGISTRO
);

create  index ESTA_INSCRITO_FK on REGISTRO_EST_MAT (
CODSIS_EST
);

create  index RELATIONSHIP_25_FK on REGISTRO_EST_MAT (
ID_DOC_MAT
);

create table SESIONES
(
   ID_SESION SERIAL not null,
   NUM_SESION INT4 null,
   ID_GRUPO_LAB INT4 null,
   FECHA DATE not null,
   constraint PK_SESIONES primary key (ID_SESION)
);

create unique index SESIONES_PK on SESIONES (
ID_SESION
);

create  index RELATIONSHIP_32_FK on SESIONES (
NUM_SESION
);

create  index RELATIONSHIP_28_FK on SESIONES (
ID_GRUPO_LAB
);

alter table ASISTENCIA
   add constraint FK_ASISTENC_RELATIONS_SESIONES foreign key (ID_SESION)
      references SESIONES (ID_SESION)
on delete restrict on
update restrict;

alter table ASISTENCIA
   add constraint FK_ASISTENC_RELATIONS_ESTUDIAN foreign key (CODSIS_EST)
      references ESTUDIANTES (CODSIS_EST)
on delete restrict on
update restrict;

alter table DOCENTES_MATERIAS
   add constraint FK_DOCENTES_RELATIONS_DOCENTES foreign key (CODSIS_DOC)
      references DOCENTES (CODSIS_DOC)
on delete restrict on
update restrict;

alter table DOCENTES_MATERIAS
   add constraint FK_DOCENTES_RELATIONS_MATERIAS foreign key (COD_MATERIA)
      references MATERIAS (COD_MATERIA)
on delete restrict on
update restrict;

alter table EJERCICIOS
   add constraint FK_EJERCICI_RELATIONS_SESIONES foreign key (ID_SESION)
      references SESIONES (ID_SESION)
on delete restrict on
update restrict;

alter table GRUPO_LABORATORIO
   add constraint FK_GRUPO_LA_PERTENECE_HORARIOS foreign key (ID_HORARIO)
      references HORARIOS (ID_HORARIO)
on delete restrict on
update restrict;

alter table GRUPO_LABORATORIO
   add constraint FK_GRUPO_LA_RELATIONS_MATERIAS foreign key (COD_MATERIA)
      references MATERIAS (COD_MATERIA)
on delete restrict on
update restrict;

-- alter table GRUPO_LABORATORIO
--    add constraint FK_GRUPO_LA_RELATIONS_AUXILIAR foreign key (ID_AUXILIAR)
--       references AUXILIARES (ID_AUXILIAR)
-- on delete restrict on
-- update restrict;

alter table PORTAFOLIOS
   add constraint FK_PORTAFOL_SON_SOLUC_EJERCICI foreign key (ID_EJERCICIO)
      references EJERCICIOS (ID_EJERCICIO)
on delete restrict on
update restrict;

alter table PORTAFOLIOS
   add constraint FK_PORTAFOL_TIENEN_ESTUDIAN foreign key (CODSIS_EST)
      references ESTUDIANTES (CODSIS_EST)
on delete restrict on
update restrict;

alter table REGISTRO_EST_LAB
   add constraint FK_REGISTRO_RELATIONS_ESTUDIAN foreign key (CODSIS_EST)
      references ESTUDIANTES (CODSIS_EST)
on delete restrict on
update restrict;

alter table REGISTRO_EST_LAB
   add constraint FK_REGISTRO_RELATIONS_GRUPO_LA foreign key (ID_GRUPO_LAB)
      references GRUPO_LABORATORIO (ID_GRUPO_LAB)
on delete restrict on
update restrict;

alter table REGISTRO_EST_MAT
   add constraint FK_REGISTRO_ESTA_INSC_ESTUDIAN foreign key (CODSIS_EST)
      references ESTUDIANTES (CODSIS_EST)
on delete restrict on
update restrict;

alter table REGISTRO_EST_MAT
   add constraint FK_REGISTRO_RELATIONS_DOCENTES foreign key (ID_DOC_MAT)
      references DOCENTES_MATERIAS (ID_DOC_MAT)
on delete restrict on
update restrict;

alter table REGISTRO_AUX_LAB
   add constraint FK_REGISTRO_RELATIONS_AUXILIARES foreign key (ID_AUXILIAR)
      references AUXILIARES (ID_AUXILIAR)
on delete restrict on
update restrict;

alter table REGISTRO_AUX_LAB
   add constraint FK_REGISTRO_RELATIONS_GRUPO_LABORATORIO foreign key (ID_GRUPO_LAB)
      references GRUPO_LABORATORIO (ID_GRUPO_LAB)
on delete restrict on
update restrict;

alter table SESIONES
   add constraint FK_SESIONES_RELATIONS_GRUPO_LA foreign key (ID_GRUPO_LAB)
      references GRUPO_LABORATORIO (ID_GRUPO_LAB)
on delete restrict on
update restrict;

/*============  DATOS DE PRUEBA =======================*/

INSERT INTO auxiliares
VALUES
   (1, 'Juan', 'Perez Castro', 'M', 'jperez@gmail.com', 'password', 'auxiliar');
INSERT INTO auxiliares
VALUES
   (2, 'Pedro', 'Dominguez P.', 'M', 'pdominguez@gmail.com', 'password', 'auxiliar');
INSERT INTO auxiliares
VALUES
   (3, 'Luis', 'Castro Martinez', 'M', 'lcastro@gmail.com', 'password', 'auxiliar');
INSERT INTO auxiliares
VALUES
   (4, 'Maria', 'Castro Ramirez', 'F', 'mcastro@gmail.com', 'password', 'auxiliar');
INSERT INTO auxiliares
VALUES
   (5, 'Andrea', 'Lopez H.', 'F', 'alopez@gmail.com', 'password', 'auxiliar');

INSERT INTO docentes
VALUES
   ('1111', 'Vladimir', 'Costas P.', 0000, 0000, 'M', 'vcostas@gmail.com', 'password', 'docente', true);
INSERT INTO docentes
VALUES
   ('1112', 'Ruben', 'Dario I.', 0000, 0000, 'M', 'rdario@gmail.com', 'password', 'docente', true);
INSERT INTO docentes
VALUES
   ('1113', 'Corina', 'Flores R.', 0000, 0000, 'F', 'cflores@gmail.com', 'password', 'docente', true);
INSERT INTO docentes
VALUES
   ('1114', 'Matias', 'Bibrio P.', 0000, 0000, 'M', 'mbibrio@gmail.com', 'password', 'docente', true);
INSERT INTO docentes
VALUES
   ('1115', 'Letica', 'Blanco C.', 0000, 0000, 'M', 'lblanco@gmail.com', 'password', 'docente', true);

INSERT INTO estudiantes
VALUES
   ('9001', 'Alejandro', 'Gonzales Avila', 1000, 'M', 'agonzales@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9002', 'Isaias', 'Martinez A.', 1000, 'M', 'imartinez@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9003', 'Ricardo', 'Huerta Castillo', 1000, 'M', 'rhuerta@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9004', 'Benjamin', 'Castillo Costas', 1000, 'M', 'bcastillo@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9005', 'Jose Antonio', 'Garcia G.', 1000, 'M', 'jgarcia@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9006', 'Jonathan', 'Ibarra C.', 1000, 'M', 'jibarra@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9007', 'David', 'Conde Condori', 1000, 'M', 'dconde@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9008', 'Sergio', 'Condori Costas', 1000, 'M', 'scondori@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9009', 'Alan', 'Maraez M.', 1000, 'M', 'amaraez@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9010', 'Andrea Paola', 'Ramirez Martinez.', 1000, 'F', 'aramirez@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9011', 'Nancy', 'Yescas Ibarra', 1000, 'F', 'nyescas@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9012', 'Laura', 'Juarez Aranguis', 1000, 'F', 'ljuarez@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9013', 'Diana', 'Aranguis Medrano', 1000, 'F', 'daranguis@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9014', 'Gabriela', 'Medrano Torrico', 1000, 'F', 'gmedrano@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9015', 'Arlet', 'Torrico Flores', 1000, 'F', 'atorrico@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9016', 'Alexia', 'Flores Chura', 1000, 'F', 'aflores@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9017', 'Alexis', 'Chura Lopez', 1000, 'F', 'achura@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9018', 'Luana', 'Jaillita Huanca', 1000, 'F', 'ljaillita@gmail.com', 'password', 'estudiante');
INSERT INTO estudiantes
VALUES
   ('9019', 'Jessia', 'Lopez Lima', 1000, 'F', 'jlopez@gmail.com', 'password', 'estudiante');


INSERT INTO materias
VALUES
   ('2010010', 'Introduccion a la programación', null);
INSERT INTO materias
VALUES
   ('2010011', 'Elementos de programacion', null);
INSERT INTO materias
VALUES
   ('2010012', 'Taller de programacion', null);

INSERT INTO gestiones
VALUES
   (1, 'I-2019');
INSERT INTO gestiones
VALUES
   (2, 'II-2019');

-- INSERT INTO dia_semana VALUES ('Lunes');
-- INSERT INTO dia_semana VALUES ('Martes');
-- INSERT INTO dia_semana VALUES ('Miércoles');
-- INSERT INTO dia_semana VALUES ('Jueves');
-- INSERT INTO dia_semana VALUES ('Viernes');
-- INSERT INTO dia_semana VALUES ('Sábado');

-- INSERT INTO docentes VALUES (111, 4, 'Leticia', 'Blanco', null, '123456', null);
-- INSERT INTO docentes VALUES (222, 5, 'Corina', 'Flores', null, '123456', null);
-- INSERT INTO docentes VALUES (333,  6,'Vladimir', 'Costas', null, '123456', null);

-- INSERT INTO materias VALUES ('2010010', 'Introduccion a la programación', null);
-- INSERT INTO materias VALUES ('2010003', 'Elementos de programacion', null);

-- INSERT INTO grupos VALUES (1);
-- INSERT INTO grupos VALUES (2);
-- INSERT INTO grupos VALUES (3);
-- INSERT INTO grupos VALUES (4);
-- INSERT INTO grupos VALUES (5);
-- INSERT INTO grupos VALUES (6);
-- INSERT INTO grupos VALUES (7);
-- INSERT INTO grupos VALUES (8);
-- INSERT INTO grupos VALUES (9);
-- INSERT INTO grupos VALUES (10);

-- INSERT INTO docentes_materias VALUES (3, '2010010', 333, 10);
-- INSERT INTO docentes_materias VALUES (1, '2010010', 111, 7);
-- INSERT INTO docentes_materias VALUES (2, '2010010', 222, 2);
-- INSERT INTO docentes_materias VALUES (4, '2010003', 111, 1);

-- INSERT INTO estudiantes VALUES (11, 7,'tere', 'rai', null, 123456);
-- INSERT INTO estudiantes VALUES (22, 8,'mari', 'rai', null, 123456);
-- INSERT INTO estudiantes VALUES (33, 9,'luis', 'rai', null, 123456);



-- INSERT INTO laboratorios VALUES (1);
-- INSERT INTO laboratorios VALUES (2);
-- INSERT INTO laboratorios VALUES (3);

-- INSERT INTO horarios VALUES (1, '14:15', '15:45');
-- INSERT INTO horarios VALUES (2, '15:45', '17:15');

-- INSERT INTO grupo_laboratorio VALUES (1, '2010010', 10, 1, 1, 'I/2019', 'Lunes');
-- INSERT INTO grupo_laboratorio VALUES (2, '2010010', 10, 1, 1, 'I/2019', 'Martes');
-- INSERT INTO grupo_laboratorio VALUES (3, '2010010', 10, 1, 2, 'I/2019', 'Martes');
-- INSERT INTO grupo_laboratorio VALUES (4, '2010003', 20, 2, 2, 'I/2019', 'Miércoles');

-- INSERT INTO sesiones VALUES (1, 1, 1, '2019-03-25');
-- INSERT INTO sesiones VALUES (2, 2, 1, '2019-03-26');
-- INSERT INTO sesiones VALUES (3, 3, 1, '2019-03-27');
-- INSERT INTO sesiones VALUES (4, 1, 2, '2019-03-26');
-- INSERT INTO sesiones VALUES (5, 2, 2, '2019-03-27');
-- INSERT INTO sesiones VALUES (6, 1, 3, '2019-03-25');

-- INSERT INTO ejercicios VALUES (1, 1, 'ejercicio_1');
-- INSERT INTO ejercicios VALUES (2, 1, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (3, 1, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (4, 2, 'ejercicio_1');
-- INSERT INTO ejercicios VALUES (5, 2, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (6, 2, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (7, 3, 'ejercicio_1');
-- INSERT INTO ejercicios VALUES (8, 3, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (9, 3, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (10, 4, 'ejercicio_1');
-- INSERT INTO ejercicios VALUES (11, 4, 'ejercicio_2');
-- INSERT INTO ejercicios VALUES (12, 4, 'ejercicio_2');

-- INSERT INTO portafolios VALUES (1, 11, 1, 'solucion_1');
-- INSERT INTO portafolios VALUES (2, 11, 5, 'solucion_2');
-- INSERT INTO portafolios VALUES (3, 22, 1, 'solucion_1');
-- INSERT INTO portafolios VALUES (4, 22, 6, 'solucion_2');
-- INSERT INTO portafolios VALUES (5, 33, 1, 'solucion_1');
-- INSERT INTO portafolios VALUES (6, 33, 6, 'solucion_2');
-- INSERT INTO portafolios VALUES (7, 33, 7, 'solucion_1');
-- INSERT INTO portafolios VALUES (8, 33, 12, 'solucion_2');

-- INSERT INTO REGISTRO_EST_MAT VALUES (1, 11, 1, 'I/2019');
-- INSERT INTO REGISTRO_EST_MAT VALUES (2, 22, 3, 'I/2019');
-- INSERT INTO REGISTRO_EST_MAT VALUES (3, 33, 2, 'I/2019');
-- INSERT INTO REGISTRO_EST_MAT VALUES (4, 22, 4, 'I/2019');

-- INSERT INTO registro_est_lab VALUES (1, 11, 3, '2019-01-10');
-- INSERT INTO registro_est_lab VALUES (2, 22, 2, '2019-01-10');
-- INSERT INTO registro_est_lab VALUES (3, 33, 1, '2019-01-10');
-- INSERT INTO registro_est_lab VALUES (4, 33, 4, '2019-01-10');

-- INSERT INTO asistencia VALUES (1, 33, 1);
-- INSERT INTO asistencia VALUES (2, 33, 2);
-- INSERT INTO asistencia VALUES (3, 33, 3);
-- INSERT INTO asistencia VALUES (4, 33, 4);
-- INSERT INTO asistencia VALUES (5, 33, 5);
-- INSERT INTO asistencia VALUES (6, 11, 1);
-- INSERT INTO asistencia VALUES (7, 11, 4);
-- INSERT INTO asistencia VALUES (8, 22, 1);
-- INSERT INTO asistencia VALUES (9, 22, 3);
-- INSERT INTO asistencia VALUES (10, 22, 5);

