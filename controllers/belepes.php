<?php

class Belepes_Controller
{
    private $felhasznalo_model;
    public $baseName = 'belepes';

    public function __construct()
	{
		$this->felhasznalo_model = new Felhasznalo_Model();
	}

    public function main(array $vars)
    {
        if (bejelentkezve()) {
			header('Location: ' . SITE_ROOT, true, 302);
			die();
		}

        $view = new View_Loader($this->baseName."_main");
        $validation_errors = [];
        $form_type = $_POST['form_type'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($form_type == 'registration') {
                $validation_errors = $this->validate_registration();

                if (empty($validation_errors)) {
                    $this->felhasznalo_model->felhasznalo_hozzaad([
                        'csaladi_nev'   => $_POST['csaladi_nev'],
                        'utonev'        => $_POST['utonev'],
                        'bejelentkezes' => $_POST['bejelentkezes'],
                        'jelszo'        => $_POST['jelszo']
                    ]);

                    $view->assign('successful_registration', true);
                }
            } else if ($form_type == 'login') {
                $validation_errors = $this->validate_login();

                if (empty($validation_errors)) {

                    bejelentkeztet(
						$this->felhasznalo_model->get_felhasznalo($_POST['bejelentkezes'])
					);

                    header('Location: ' . SITE_ROOT, true, 302);
                    die();
                }
            }
        }

        $view->assign('validation_errors', $validation_errors);
        $view->assign('form_type', $form_type);
    }

    public function validate_registration()
	{
		$validation_errors = [];

		$csaladi_nev = $_POST['csaladi_nev'] ?? '';

		if (empty($csaladi_nev)) {
			$validation_errors['csaladi_nev'] = 'A családi név megadása kötelező.';
		} else if(mb_strlen($csaladi_nev) > 45) {
			$validation_errors['csaladi_nev'] = 'A családi név maximum 45 karakter lehet.';
		}

		$utonev = $_POST['utonev'] ?? '';

		if (empty($utonev)) {
			$validation_errors['utonev'] = 'Az utónév megadása kötelező.';
		} else if(mb_strlen($utonev) > 45) {
			$validation_errors['utonev'] = 'Az utónév maximum 45 karakter lehet.';
		}

		$bejelentkezes = $_POST['bejelentkezes'] ?? '';

		if (empty($bejelentkezes)) {
			$validation_errors['bejelentkezes'] = 'A bejelentkezési név megadása kötelező.';
		} else if (mb_strlen($bejelentkezes) > 12) {
			$validation_errors['bejelentkezes'] = 'A bejelentkezési név maximum 12 karakter lehet.';
		} else if ($this->felhasznalo_model->felhasznalo_letezik($bejelentkezes)) {
			$validation_errors['bejelentkezes'] = 'A bejelentkezési név már foglalt.';
		}

		$jelszo = $_POST['jelszo'] ?? '';
		$jelszo_ujra = $_POST['jelszo_ujra'] ?? '';

		if (empty($jelszo)) {
			$validation_errors['jelszo'] = 'A jelszó megadása kötelező.';
		} else if (mb_strlen($jelszo) < 6) {
			$validation_errors['jelszo'] = 'A jelszónak minimum 6 karakternek kell lennie.';
		} else if ($jelszo !== $jelszo_ujra) {
			$validation_errors['jelszo'] = 'A két jelszó nem egyezik meg egymással.';
		}

		return $validation_errors;
	}

    public function validate_login()
	{
		$validation_errors = [];

		$bejelentkezes = $_POST['bejelentkezes'] ?? '';

		if (empty($bejelentkezes)) {
			$validation_errors['bejelentkezes'] = 'A bejelentkezési név megadása kötelező.';
		} else if (!$this->felhasznalo_model->felhasznalo_letezik($bejelentkezes)) {
			$validation_errors['bejelentkezes'] = 'Nem létező felhasználó.';
		}

		$jelszo = $_POST['jelszo'] ?? '';

		if (empty($jelszo)) {
			$validation_errors['jelszo'] = 'A jelszó megadása kötelező.';
		}

		if (!isset($validation_errors['bejelentkezes']) && !isset($validation_errors['jelszo'])) {
			if (!$this->felhasznalo_model->jelszot_ellenoriz($bejelentkezes, $jelszo)) {
				$validation_errors['jelszo'] = 'Nem megfelelő jelszó.';
			}
		}

		return $validation_errors;
	}
}

?>