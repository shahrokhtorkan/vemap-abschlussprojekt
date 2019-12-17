<?php

use App\Document;
use App\Patient;
use App\User;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Patient::all() as $patient) {
            for ($i = 0; rand(0, 8); ++$i) {
                $text = Arr::random([
                    "Massage bds a.p. I,II dist. Repr.",
                    "Mobilisierung li. Knie nach Verletzung Iliotibialband",
                    "Seit dem Anfang des 20. Jahrhunderts hat sich die deutsche Physiotherapie vorwiegend darum bemüht, sich im Gesundheitswesen zu etablieren und zu verankern.",
                    "PT hat sich entlang der Medizin entwickelt und somit am medizinischen Denkmodell definiert.",
                    "Grundlegend für das medizinische Modell war zu dieser Zeit das Konzept der „Normalität“, das die Therapie wiederherstellen sollte.",
                    "Abweichungen gelten als abnormal.",
                    "Jede Krankheit hatte demnach einen nachweisbaren Auslöser (beispielsweise einen Keim). ",
                    "Die Medizin behandelte demnach nicht das Individuum, sondern die Krankheit und versuchte sie zu eliminieren.",
                    "Erst seit Mitte der 1990er Jahre vollzieht sich allmählich ein Paradigmenwechsel.",
                    "Die Krankheit wird nicht mehr primär als Funktionsstörung gesehen, die repariert werden soll, sondern eine ganzheitliche Sichtweise steht im Vordergrund.",
                    "Die Theorien der Physiotherapie basieren primär auf Anatomie und Physiologie des Menschen bzw. auf bewegungswissenschaftlichen Grundlagen (z. B. motorisches Training, sensomotorische Aktivierung, Wahrnehmungstraining, Haltungsschulung). Die physikalische Therapie basiert zudem auf den Grundlagen der Physik (z. B. Elektro-, Ultraschall-, Thermo-, Hydro-, Balneotherapie).",
                    "Der Physiotherapie stehen eine Vielzahl von Techniken zur Verfügung, unter anderen PNF (Propriozeptive Neuromuskuläre Fazilitation), Manuelle Therapie (Mobilisierende Techniken zur Gelenksmobilisation), Weichteiltechniken (Heilmassage, Bindegewebstechniken, osteopathische Techniken zur Faszienmobilisation), Sensomotorische Aktivierung (Semota, Kognitives Training nach Perfetti) und Heilgymnastik (passive, assistive, aktive oder resistive Techniken).",
                    "Die grundlegende Ausbildung befähigt jedoch nicht automatisch zur Durchführung dieser Techniken.",
                    "Wird eine zulassungsbeschränkte Therapieform wie beispielsweise Manuelle Therapie, PNF, Neurophysiologische Techniken o. ä. vom Arzt an den Physiotherapeuten verordnet, so ist zur Erbringung des Heilmittels (Rezeptposition) der Qualifizierungs-Nachweis des Therapeuten gegenüber der Krankenkasse notwendig.",
                ]);
                $documents = new Document();
                $user = User::find(1);
                $documents->user()->associate($user);
                $documents->patient()->associate($patient);
                $documents->text=$text;
                $documents->save();
            }
        }

        $user = User::findOrFail(2);
        $document = Document::findOrFail(1);
        $user->document()->save($document);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
