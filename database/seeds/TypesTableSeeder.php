<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Appartamento' => "Di solito si trovano in edifici o complessi residenziali con più alloggi in cui vivono altre persone",
            'Casa' => "Spesso strutture indipendenti, che in alcuni casi, come le case bifamiliari, possono condividere con altri alloggi muri o aree all'aperto",
            'Bed and breakfast' => "Strutture di compagnie d'ospitalità professionale in cui viene offerta la colazione ai propri ospiti. Di solito vi risiedono anche gli host.",
            'Spazio unico' => "Alloggi con caratteristiche strutturali d'interesse o non convenzionali rispetto alle case e agli appartamenti tradizionali",
            'Alloggio secondario' => "Hanno un ingresso privato per gli ospiti e solitamente condividono la proprietà con un'altra struttura"
        ];

        foreach ($types as $name => $descr) {
            $type = new Type;
            $type->type = $name;
            $type->descr_type = $descr;
            $type->save();
        }
    }
}
