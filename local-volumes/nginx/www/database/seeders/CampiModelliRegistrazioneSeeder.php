<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CampiModelliRegistrazione;

class CampiModelliRegistrazioneSeeder extends Seeder
{

    public function run()
    {
        // Controlla se la tabella è vuota
        if (CampiModelliRegistrazione::count() == 0) {
            $lingue = ['it', 'en', 'de', 'fr', 'es'];
            $traduzioni_nome = [
                'it' => 'nome',
                'en' => 'name',
                'de' => 'Name',
                'fr' => 'nom',
                'es' => 'nombre',
            ];

            $traduzioni_cognome = [
                'it' => 'cognome',
                'en' => 'surname',
                'de' => 'nachname',
                'fr' => 'prénom',
                'es' => 'apellido',
            ];

            $traduzioni_azienda = [
                'it' => 'azienda',
                'en' => 'company',
                'de' => 'agentur',
                'fr' => 'agence',
                'es' => 'agencia',
            ];

            $traduzioni_azienda = [
                'it' => 'azienda',
                'en' => 'company',
                'de' => 'agentur',
                'fr' => 'agence',
                'es' => 'agencia',
            ];

            $traduzioni_email = [
                'it' => 'email',
                'en' => 'email',
                'de' => 'email',
                'fr' => 'email',
                'es' => 'email',
            ];

            $traduzioni_telefono = [
                'it' => 'telefono',
                'en' => 'phone',
                'de' => 'telefon',
                'fr' => 'téléphone',
                'es' => 'teléfono',
            ];

            $traduzioni_reparto = [
                'it' => 'reparto',
                'en' => 'department',
                'de' => 'abteilung',
                'fr' => 'département',
                'es' => 'departamento',
            ];

            $traduzioni_persona = [
                'it' => 'persona',
                'en' => 'person',
                'de' => 'person',
                'fr' => 'personne',
                'es' => 'persona',
            ];

            $traduzioni_privacy = [
                'it' => "Dichiaro di avere letto l'informativa sulla privacy e acconsento al trattamento dei dati forniti",
                'en' => 'I declare that I have read the privacy policy and consent to the processing of the data provided',
                'de' => 'Ich erkläre, dass ich die Datenschutzerklärung gelesen habe und mit der Verarbeitung der angegebenen Daten einverstanden bin',
                'fr' => 'Je déclare avoir lu la politique de confidentialité et consentir au traitement des données fournies',
                'es' => 'Declaro que he leído la política de privacidad y consiento el tratamiento de los datos facilitados',
            ];

            $traduzioni_regolamento = [
                'it' => "Dichiaro di avere letto il regolamento aziendale ed acconsento al trattamento dei dati forniti",
                'en' => 'I declare that I have read and accept the company regulations',
                'de' => 'Ich erkläre, dass ich die Betriebsordnung gelesen habe und akzeptiere',
                'fr' => "Je déclare avoir lu et accepté le règlement de l'entreprise",
                'es' => 'Declaro que he leído y acepto el reglamento de la empresa',
            ];

            foreach ($lingue as $lingua) {
                //nome
                CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'nome_persona',
                    'label' => $traduzioni_nome[$lingua],
                    'placeholder' => $traduzioni_nome[$lingua],
                    'tipo' => 'testo',
                    'abilitato' => 1,
                    'obbligatorio' => 1,
                    'posizione' => 1,                    
                ]);
                //cognome
                CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'cognome_persona',
                    'label' => $traduzioni_cognome[$lingua],
                    'placeholder' => $traduzioni_cognome[$lingua],
                    'tipo' => 'testo',
                    'abilitato' => 1,
                    'obbligatorio' => 1,
                    'posizione' => 2,
                ]);

                 //azienda
                 CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'cognome_persona',
                    'label' => $traduzioni_azienda[$lingua],
                    'placeholder' => $traduzioni_azienda[$lingua],
                    'tipo' => 'testo',
                    'abilitato' => 1,
                    'obbligatorio' => 1,
                    'posizione' => 3,
                ]);

                 //email
                 CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'email',
                    'label' => $traduzioni_email[$lingua],
                    'placeholder' => $traduzioni_email[$lingua],
                    'tipo' => 'email',
                    'abilitato' => 1,
                    'obbligatorio' => 0,
                    'posizione' => 4,
                ]);

                 //telefono
                 CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'telefono',
                    'label' => $traduzioni_telefono[$lingua],
                    'placeholder' => $traduzioni_telefono[$lingua],
                    'tipo' => 'testo',
                    'abilitato' => 1,
                    'obbligatorio' => 0,                    
                    'posizione' => 5,
                ]);

                //reparto
                CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'reparto',
                    'label' => $traduzioni_reparto[$lingua],
                    'placeholder' => $traduzioni_reparto[$lingua],
                    'tipo' => 'select_reparto',
                    'abilitato' => 1,
                    'obbligatorio' => 1,
                    'posizione' => 6,
                ]);

                //persona
                CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'persona',
                    'label' => $traduzioni_persona[$lingua],
                    'placeholder' => $traduzioni_persona[$lingua],
                    'tipo' => 'select_persona',
                    'abilitato' => 1,
                    'obbligatorio' => 1,
                    'posizione' => 6,
                ]);

                //privacy
                CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'privacy',
                    'label' => $traduzioni_privacy[$lingua],
                    'placeholder' => $traduzioni_privacy[$lingua],
                    'tipo' => 'checkbox_privacy',
                    'abilitato' => 1,
                    'obbligatorio' => 1,
                    'posizione' => 7,
                ]);

                 //regolamento
                 CampiModelliRegistrazione::create([
                    'modelli_registrazione_id' => 1,
                    'lingua' => $lingua,
                    'nome' => 'regolamento',
                    'label' => $traduzioni_regolamento[$lingua],
                    'placeholder' => $traduzioni_regolamento[$lingua],
                    'tipo' => 'checkbox_regolamento',
                    'abilitato' => 0,
                    'obbligatorio' => 1,
                    'posizione' => 8,
                ]);
                
            }
            $this->command->info('Campi per moello di registrazione di default creato');
        }
        else
        {
            $this->command->info('Campi per moello di registrazione già presenti');
        }
    }
}

