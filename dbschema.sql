create table tbl_user (
	nim varchar(20),
	nama varchar(30),
	password varchar(20),

	primary key (nim)
);

create table tbl_admin (
	nim varchar(20),

	key fk_nim2(nim),
	constraint fk_nim2 foreign key (nim) references tbl_user(nim)
);

create table tbl_matakuliah (
	kode_matakuliah varchar(15),
	nama_matakuliah varchar(35),
	sks int,

	primary key (kode_matakuliah)
);

create table tbl_jadwal_lab (
	kode_jadwal varchar(10),
	kode_matakuliah varchar(15),
	kelas varchar(5),
	hari varchar(10),
	jam_mulai time,
	jam_selesai time,
	nama_lab varchar(15),
	
	primary key (kode_jadwal),

	key fk_kode_matakuliah(kode_matakuliah),
	constraint fk_kode_matakuliah foreign key (kode_matakuliah) references tbl_matakuliah(kode_matakuliah)
);

create table tbl_asisten (
	kode_jadwal varchar(10),
	nama_asisten varchar(35),

	key fk_kode_jadwal(kode_jadwal),
	constraint fk_kode_jadwal foreign key (kode_jadwal) references tbl_jadwal_lab(kode_jadwal)
);

create table tbl_nilai(
	nim varchar(20),
	kode_matakuliah varchar(15),
	kelas varchar(5),
	laporan varchar(10),
	tgl_kumpul datetime,
	nilai int,

	key fk_nim(nim),
	constraint fk_nim foreign key (nim) references tbl_user(nim),
	key fk_kode_matakuliah2(kode_matakuliah),
	constraint fk_kode_matakuliah2 foreign key (kode_matakuliah) references tbl_matakuliah(kode_matakuliah)
);

insert into tbl_user values ('201431290','m umar ramadhana','admin');
insert into tbl_asisten values ('sn002','m umar r');
insert into tbl_nilai values ('201431291','');
insert into tbl_admin values ('201431290');

insert into tbl_matakuliah values ('C31040106','algoritma & pemrograman 2',3);
insert into tbl_matakuliah values ('C31040110','statistika',3);
insert into tbl_matakuliah values ('C31040202','bahasa rakitan',2);
insert into tbl_matakuliah values ('C31040210','mikroprosesor',3);
insert into tbl_matakuliah values ('C31040206','pemrograman objek',2);
insert into tbl_matakuliah values ('C31040202','cloud computing',2);
insert into tbl_matakuliah values ('C31040203','perancangan basis data',2);
insert into tbl_matakuliah values ('C31040204','rekayasa perangkat lunak',4);

insert into tbl_jadwal_lab values ('sn01','C31040202','A','senin','08:00','09:40','dasar 1');
insert into tbl_jadwal_lab values ('sn02','C31040106','A','senin','10:00','12:30','dasar 1');
insert into tbl_jadwal_lab values ('sn03','C31040106','B','senin','13:00','15:30','dasar 1');
insert into tbl_jadwal_lab values ('sn04','C31040106','F','senin','13:00','15:40','dasar 2');

insert into tbl_jadwal_lab values ('sl01','C31040202','C','selasa','08:00','09:40','dasar 1');
insert into tbl_jadwal_lab values ('sl02','C31040106','C','selasa','10:00','12:30','dasar 1');
insert into tbl_jadwal_lab values ('sl03','C31040110','B','selasa','13:00','15:30','dasar 1');
insert into tbl_jadwal_lab values ('sl04','C31040202','D','selasa','11:00','12:40','dasar 2');
insert into tbl_jadwal_lab values ('sl05','C31040106','G','selasa','13:00','15:30','dasar 2');

insert into tbl_nilai values ('201431290','C31040106','A','1','2017-06-01 03:00:00',90);