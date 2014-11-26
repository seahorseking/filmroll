<?php
class View extends Part{
	
	private $movies;
	
	public function __construct($module){
		parent::__construct($module);
		
		$this->movies = array(
				'the-interview' => array(
						'title' => "The Interview",
						'slug' => "the-interview",
						'length' => "1:30:00",
						'genre' => "Komedia",
						'origin' => "US",
						'csfd' => "http://www.csfd.cz/film/357422-interview-the/videa/",
						'trailler' => base_url()."content/film/the-interview/trailler.jpg",
						'description' => "Dave Skylark (James Franco) a jeho producent Aaron Rapoport (Seth Rogen) spoločne vedú úspešnú televíznu show o celebritách, pričom sa dozvedia, že veľkým fanúšikom ich programu je aj Kim Čong-un. Rozhodnú sa využiť túto príležitosť, letieť do Severnej Kórey, trochu Kima vyspovedať a zároveň aj konečne ukázať svetu, že vedia byť aj serióznymi novinármi. Všetko sa však obráti naruby, keď sa o ich ceste dozvie CIA, a títo dvaja netrénovaní blázni majú podľa ich pokynov Kima zabiť",
						
				),
				'interstellar' => array(
						'title' => "Interstellar",
						'slug' => "interstellar",
						'length' => "2:10:00",
						'genre' => "Sci-fi",
						'origin' => "US",
						'csfd' => "csfd",
						'trailler' => "trailler",
						'description' => "desc",
				),
				'the-fighter' => array(
						'title' => "The Fighter",
						'slug' => "the-fighter",
						'length' => "1:50:00",
						'genre' => "Drama",
						'origin' => "US",
						'csfd' => "csfd",
						'trailler' => "trailler",
						'description' => "desc",
				),
		);
	}
	
	public function index($lang = ""){
		$lang = valid_language($lang);
		$this->data['language'] = $lang;
		$this->data['style'] = array('main');
	
		//language
		if ($this->language_model->count_all() > 1){
			$tmp_lang = $this->language_model->get();
			$this->data['language_option'] = get_lang_label(base_url()."index.php/%l", array(), $tmp_lang, $lang);
		}
		$this->data['lang'] = $this->load->view("view/lang", $this->data, true);
	
		$template_data['title'] = "Filmroll | film";
		$template_data['side'] = $this->load->view("view/side", $this->data, true);
		$template_data['header'] = $this->load->view("view/header", $this->data, true);
		$template_data['body'] = $this->load->view("view/body", $this->data, true);
		$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
	
		//load template
		$this->module->load->view("layouts/main", $template_data);
	}
	
	public function view($slug, $lang = ""){
		$lang = valid_language($lang);
		$this->data['language'] = $lang;
		$this->data['style'] = array('main', 'film', 'program');
	
		//if slug is actually language
		if ($lang == "" && $this->language_model->exists_shortcut($slug)){
			$this->index($slug);
		}
		else{
			if (isset($this->movies[$slug])){
				$this->data['movie'] = $this->movies[$slug];
				$template_data['title'] = "Filmroll | ".$this->data['movie']['title'];
				$template_data['side'] = $this->load->view("view/side", $this->data, true);
				$template_data['header'] = $this->load->view("view/header", $this->data, true);
				$template_data['body'] = $this->load->view("view/body_film", $this->data, true);
				$template_data['footer'] = $this->load->view("view/footer", $this->data, true);
					
				//load template
				$this->load->view("layouts/main", $template_data);
			}
			else{
				echo "ERROR";
			}
		}
	}
}