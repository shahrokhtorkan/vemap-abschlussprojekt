<?php

use Illuminate\Database\Seeder;
use App\Patient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PatientsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(AppointmentsTableSeeder::class);

        for ($i=0; $i<30; ++$i) {
            $firstname = Arr::random(['Horst', 'Claudia', 'Georg', 'Alois', 'Erich', 'Werner', 'Arnold', 'Norbert', 'Stefan', 'Gustav', 'Edith', 'Heinz-Christian', 'Rudolf', 'Florian', 'Wolfgang', 'Josephine', 'Ludwig', 'Fritz', 'Franz', 'Karl', 'Josef', 'Agnes', 'Peter', 'Kurt', 'Birgit', 'Sabine', 'Gisela', 'Bianca', 'Jutta', 'Felix', 'Sara', 'Friedrich', 'Otto', 'Sebastian', 'Michael', 'Alex', 'Andreas', 'Bernhardt', 'Silvia', 'Judith', 'Johannes', 'Irmgard', 'Ingrid', 'Klara', 'Siegfried', 'Albert', 'Herbert', 'Helene', 'Simon',  'Anna', 'Katharina', 'Marie', 'Daniel', 'Walter', 'Jeanette', 'Ferdinand', 'Wilhelm', 'Martin']);
            $lastname = Arr::random(['Mueller', 'Brunner', 'Froehlich', 'Schwarz', 'Salzmann', 'Berger', 'Wolf', 'Putz', 'Schmied', 'Hofer', 'Wallner', 'Kurz', 'Nussbaum', 'Burger', 'Klein', 'Haas', 'Neumann', 'Deutsch', 'Kornfeld', 'Meyer', 'Meier', 'Mayer', 'Steiner', 'Hoefner', 'Bergmann', 'Wagner', 'Henschel', 'Uhrmann', 'Becker', 'Susskind', 'Loeffler', 'Braun', 'Kohl', 'Gerber', 'Hart', 'Blatt', 'Kempner', 'Herzog', 'Jonas', 'Adler', 'Steinberg', 'Bauer', 'Denk', 'Stern', 'Krebs', 'Katz', 'Schaerdinger', 'Goestli', 'Zweig', 'Bachmann', 'Horch', 'Mann', 'Cronfeld', 'Jellinek', 'Roth', 'Ackermann', 'Schuster', 'Hirsch', 'Fuchs', 'Kaufmann', 'Kern']);
            $svnr = rand(1000, 9999) . sprintf("%02s%02s%02s", rand(1, 28), rand(1, 12), rand(1, 99));
            $plz = rand (100, 999)."0";
            $email = strtolower($firstname) . "." . strtolower($lastname) . "@example.com";
            $city = Arr::random(['Wien', 'St. Pölten', 'Eisenstadt', 'Graz', 'Innsbruck', 'Klagenfurt', 'Bregenz', 'Salzburg', 'Linz']);
            $address = strtoupper(Str::random(1)) . strtolower(Str::random(4)) . "gasse 1/1";

            $patient = new Patient();
            $patient -> firstname = $firstname;
            $patient -> lastname = $lastname;
            $patient -> svnr = $svnr;
            $patient -> plz = $plz;
            $patient -> email = $email;
            $patient -> city = $city;
            $patient -> address = $address;
            $patient -> save();
        }
    }
}
