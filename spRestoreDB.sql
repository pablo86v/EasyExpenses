DELIMITER $$

DROP PROCEDURE IF EXISTS restoreDB$$
CREATE PROCEDURE restoreDB()
BEGIN
	
	drop table if exists Resumen;
	drop table if exists ResumenTC;
	drop table if exists TarjetaBancaria;


	create table Resumen (
		mmaaaa            varchar(6) not null primary key,   
		concepto          varchar(80)  not null,
		ingreso		      decimal(15,2) null,
		egreso			  decimal(15,2) null,
		saldo             decimal(15,2) not null,
		observaciones     varchar(200)  null
	);	
	insert into Resumen values("032019" , "Sueldo", 36987.00,"",36987.00, "");

	
	create table ResumenTC (
		mmaaaa            varchar(6) not null primary key,
		idTarjeta         int not null,
		fechaConsumo      varchar(10) null,
		conceptoConsumo   varchar (80) not null,
		cuotaActual       int null,
		cuotas            int null,
		montoCuota        decimal(15,2) not null,
		adicional         boolean not null
	);
	insert into ResumenTC values("032019",1,"29/08/2018","DESPEGAR HOTEL HULKU MX",6,6, 1403.96,false);
	
	
	create table TarjetaBancaria (
		idTarjeta         int unsigned auto_increment primary key,
		marca             varchar (50) not null,
		entidad           varchar (50) not null,
		cierre            varchar (2)  not null
	);
	insert into TarjetaBancaria values(1,"Visa","Banco Hipotecario","3J");
	
	create table ImpuestosTarjeta (
		idImpuesto        int unsigned auto_increment primary key,
		idTarjeta		  int not null,
		concepto          varchar (80) not null,
		monto             decimal(15,2) not null
	);
	insert into ImpuestosTarjeta values(1,1,"IMP SELLOS", 1200);
	
END$$

DELIMITER ;