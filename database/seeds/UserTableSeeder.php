<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->employee_no = 642;
        $user->username = "sunjhen29";
        $user->name = "Sunday Doctolero";
        $user->email = "sunday642@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 1;
		$user->position = "IT Head";
		$user->birth_date = "1987-04-01";
		$user->firstname = "Sunday";
		$user->lastname = "Doctolero";
		$user->mobile = "0906-441-9774";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 14;
        $user->username = "She";
        $user->name = "Sherwyne Anne Al Fouzan";
        $user->email = "sherwyne014@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 2;
		$user->position = "General Manager for HR";
		$user->birth_date = "1985-04-14";
		$user->firstname = "Sherwyne";
		$user->lastname = "Al Fouzan";
		$user->mobile = "0917-854-4089";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 18;
        $user->username = "Merly";
        $user->name = "Merly Gonzales";
        $user->email = "merly018@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Accounting Staff";
		$user->birth_date = "1973-05-22";
		$user->firstname = "Merly";
		$user->lastname = "Gonzales";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 20;
        $user->username = "Edward";
        $user->name = "Edward Legaspi";
        $user->email = "edward020@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 3;
		$user->position = "Messenger";
		$user->birth_date = "1976-12-08";
		$user->firstname = "Edward";
		$user->lastname = "Legaspi";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 31;
        $user->username = "Rosalie";
        $user->name = "Rosalie Ramos";
        $user->email = "rose031@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "QC";
		$user->birth_date = "1972-05-07";
		$user->firstname = "Rosalie";
		$user->lastname = "Ramos";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 39;
        $user->username = "Evangeline";
        $user->name = "Evangeline Pastrana";
        $user->email = "vangie039@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "QC";
		$user->birth_date = "1972-07-16";
		$user->firstname = "Evangeline";
		$user->lastname = "Pastrana";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 111;
        $user->username = "Tess";
        $user->name = "Ma. Teresa";
        $user->email = "tess111@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Project Manager";
		$user->birth_date = "1971-07-31";
		$user->firstname = "Ma. Teresa";
		$user->lastname = "benito";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 115;
        $user->username = "Jennifer";
        $user->name = "Jennifer Dela Cruz";
        $user->email = "jheng115@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Team Leader";
		$user->birth_date = "1970-04-12";
		$user->firstname = "Jennifer";
		$user->lastname = "Dela Cruz";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 126;
        $user->username = "Lilibeth";
        $user->name = "Lilibeth Quiambao";
        $user->email = "beth126@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 3;
		$user->position = "Staff";
		$user->birth_date = "1959-09-14";
		$user->firstname = "Lilibeth";
		$user->lastname = "Quiambao";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 143;
        $user->username = "Josie";
        $user->name = "Jocelyn Punzalan";
        $user->email = "jo143@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 3;
		$user->position = "Staff";
		$user->birth_date = "1971-03-01";
		$user->firstname = "Jocelyn";
		$user->lastname = "Punzalan";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 150;
        $user->username = "Daddy";
        $user->name = "Maximino Pastrana Jr.";
        $user->email = "jun150@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1964-07-14";
		$user->firstname = "Maximino";
		$user->lastname = "Pastrana Jr.";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 151;
        $user->username = "Angie";
        $user->name = "Angelita Rapada";
        $user->email = "angie151@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1971-03-03";
		$user->firstname = "Angelita";
		$user->lastname = "Rapada";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 231;
        $user->username = "Celia";
        $user->name = "Ma. Celia Ma";
        $user->email = "celia231@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1973-08-08";
		$user->firstname = "Ma. Celia";
		$user->lastname = "Ma";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 242;
        $user->username = "Balut";
        $user->name = "Jerrylou Sosangyo";
        $user->email = "lou242@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1972-05-22";
		$user->firstname = "Jerrylou";
		$user->lastname = "Sosangyo";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 251;
        $user->username = "Noli";
        $user->name = "Noli Estrada";
        $user->email = "noli251@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1968-10-18";
		$user->firstname = "Noli";
		$user->lastname = "Estrada";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 319;
        $user->username = "Ime";
        $user->name = "Imelda Joson";
        $user->email = "emi319@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1966-09-15";
		$user->firstname = "Imelda";
		$user->lastname = "Joson";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 320;
        $user->username = "Adol";
        $user->name = "Rodolfo Grampon";
        $user->email = "ador320@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1967-07-30";
		$user->firstname = "Rodolfo";
		$user->lastname = "Grampon";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 357;
        $user->username = "Juday";
        $user->name = "Judy Escober";
        $user->email = "judy357@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1970=08-14";
		$user->firstname = "Judy";
		$user->lastname = "Escober";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 359;
        $user->username = "Vel";
        $user->name = "Marievel Magsino";
        $user->email = "vel359@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1973-05-12";
		$user->firstname = "Marievel";
		$user->lastname = "Magsino";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 363;
        $user->username = "Nong";
        $user->name = "Miguelito Nato";
        $user->email = "nong363@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 3;
		$user->position = "Maintenance";
		$user->birth_date = "1972-09-28";
		$user->firstname = "Miguelito";
		$user->lastname = "Nato";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 368;
        $user->username = "Garry";
        $user->name = "Edgar Sanchez";
        $user->email = "garry368@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Operations Manager";
		$user->birth_date = "1970-09-24";
		$user->firstname = "Edgar";
		$user->lastname = "Sanchez";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 375;
        $user->username = "Gina";
        $user->name = "Asuncion Castillo";
        $user->email = "gina375@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1969-08-15";
		$user->firstname = "Asuncion";
		$user->lastname = "Castillo";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 376;
        $user->username = "Marg";
        $user->name = "Margarita Laureta";
        $user->email = "marge376@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1968-11-06";
		$user->firstname = "Margarita";
		$user->lastname = "Laureta";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 378;
        $user->username = "Fe";
        $user->name = "Marife Reprado";
        $user->email = "fe378@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1969-09-15";
		$user->firstname = "Marife";
		$user->lastname = "Reprado";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 398;
        $user->username = "Lalyn";
        $user->name = "Lalyn Espelita";
        $user->email = "lalyn398@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1975-09-11";
		$user->firstname = "Lalyn";
		$user->lastname = "Espelita";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 409;
        $user->username = "Rusel";
        $user->name = "Ruselia Girang";
        $user->email = "rusel409@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1975-02-20";
		$user->firstname = "Ruselia";
		$user->lastname = "Girang";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 454;
        $user->username = "Marites";
        $user->name = "Marites Ramilo";
        $user->email = "tes454@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1969-02-18";
		$user->firstname = "Marites";
		$user->lastname = "Ramilo";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 458;
        $user->username = "Norie";
        $user->name = "Leonora Tagapan";
        $user->email = "nori458@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1978-08-15";
		$user->firstname = "Leonora";
		$user->lastname = "Tagapan";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 461;
        $user->username = "Jimmy";
        $user->name = "Jimmy Estanio";
        $user->email = "jimmy461@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1970-07-16";
		$user->firstname = "Jimmy";
		$user->lastname = "Estanio";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 464;
        $user->username = "Jer";
        $user->name = "Jerry Sumperos";
        $user->email = "jerry464@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 6;
		$user->position = "Graphic Artist";
		$user->birth_date = "1976-01-20";
		$user->firstname = "Jerry";
		$user->lastname = "Sumperos";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 485;
        $user->username = "Rosie";
        $user->name = "Rosie Sumperos";
        $user->email = "rosie485@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1978-11-30";
		$user->firstname = "Rosie";
		$user->lastname = "Sumperos";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 505;
        $user->username = "Dan";
        $user->name = "Danilo Placido Jr.";
        $user->email = "dan505@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 1;
		$user->position = "Technical Support";
		$user->birth_date = "1984-03-20";
		$user->firstname = "Danilo";
		$user->lastname = "Placido Jr.";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 531;
        $user->username = "Joeren";
        $user->name = "Joeren Aquino";
        $user->email = "joeren531@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1989-05-23";
		$user->firstname = "Joeren";
		$user->lastname = "Aquino";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 536;
        $user->username = "Junel";
        $user->name = "Junel Genotiva";
        $user->email = "junel536@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1991-06-26";
		$user->firstname = "Junel";
		$user->lastname = "Genotiva";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 545;
        $user->username = "Marlon";
        $user->name = "Marlon Fabricante";
        $user->email = "marlon545@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 6;
		$user->position = "Graphic Artist";
		$user->birth_date = "1983-10-02";
		$user->firstname = "Marlon";
		$user->lastname = "Fabricante";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 604;
        $user->username = "Isa";
        $user->name = "Isabelita Joble";
        $user->email = "isa604@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Staff";
		$user->birth_date = "1956-07-08";
		$user->firstname = "Isabelita";
		$user->lastname = "Joble";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 611;
        $user->username = "Bal";
        $user->name = "Baltazar Camarista";
        $user->email = "bal611@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Staff";
		$user->birth_date = "1983-05-31";
		$user->firstname = "Baltazar";
		$user->lastname = "Camarista";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 621;
        $user->username = "Dustin";
        $user->name = "Dustin Quinto";
        $user->email = "dustin621@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Staff";
		$user->birth_date = "";
		$user->firstname = "Dustin";
		$user->lastname = "Quinto";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 692;
        $user->username = "Mich";
        $user->name = "Michelle Ong";
        $user->email = "michie692@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 1;
		$user->position = "Staff";
		$user->birth_date = "1993-03-23";
		$user->firstname = "Michelle";
		$user->lastname = "Ong";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 803;
        $user->username = "Marj";
        $user->name = "Marjhun Llena";
        $user->email = "marjhun803@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Staff";
		$user->birth_date = "1987-02-09";
		$user->firstname = "Marjhun";
		$user->lastname = "Llena";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 853;
        $user->username = "Nep";
        $user->name = "Neptalie Dela Cruz";
        $user->email = "nep853@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Staff";
		$user->birth_date = "1968-12-28";
		$user->firstname = "Neptalie";
		$user->lastname = "Dela Cruz";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 903;
        $user->username = "Maggie";
        $user->name = "Ma. Jennette Macalintal";
        $user->email = "maggie903@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Team Leader";
		$user->birth_date = "1967-02-14";
		$user->firstname = "Ma. Jennette";
		$user->lastname = "Macalintal";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 905;
        $user->username = "Perl";
        $user->name = "Perlita Salalac";
        $user->email = "perl905@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 5;
		$user->position = "Encoder";
		$user->birth_date = "1966-03-06";
		$user->firstname = "Perlita";
		$user->lastname = "Salalac";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 933;
        $user->username = "Allan";
        $user->name = "Allan Josef Glova";
        $user->email = "allan933@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 6;
		$user->position = "Graphic Artist";
		$user->birth_date = "";
		$user->firstname = "Allan Josef";
		$user->lastname = "Glova";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 935;
        $user->username = "Gab";
        $user->name = "Juan Gabriel Aldana";
        $user->email = "gab935@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 6;
		$user->position = "Graphic Artist";
		$user->birth_date = "";
		$user->firstname = "Juan Gabriel";
		$user->lastname = "Aldana";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 942;
        $user->username = "Aj";
        $user->name = "Anro Rodillo";
        $user->email = "anro942@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 7;
		$user->position = "Staff";
		$user->birth_date = "";
		$user->firstname = "Anro";
		$user->lastname = "Rodillo";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 944;
        $user->username = "Michelle";
        $user->name = "Michelle Joy Itable";
        $user->email = "mj944@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 4;
		$user->position = "Staff";
		$user->birth_date = "";
		$user->firstname = "Michelle Joy";
		$user->lastname = "Itable";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 947;
        $user->username = "Francis";
        $user->name = "Llo Francis Pasco";
        $user->email = "francis947@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 7;
		$user->position = "Staff";
		$user->birth_date = "";
		$user->firstname = "Llo Francis";
		$user->lastname = "Pasco";
		$user->mobile = "";
        $user->save();

		$user = new \App\User();
        $user->employee_no = 021;
        $user->username = "Jas";
        $user->name = "Jasmin Joy De Guzman";
        $user->email = "jas021@gmail.com";
        $user->password = '1234';
        $user->user_type = 'user';
		$user->department = 2;
		$user->position = "Staff";
		$user->birth_date = "1996-03-15";
		$user->firstname = "Jasmin Joy";
		$user->lastname = "De Guzman";
		$user->mobile = "";
        $user->save();
    }
}



