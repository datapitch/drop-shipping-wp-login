<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Main Class declairation
class Dropship_Tool_By_Mantella
{
	protected $loader;
	protected $plugin_name;
	protected $version;
	protected $domain;
	protected $api_domain;
	protected $data;
	protected $license_no;
	protected $ch;

	public function __construct()
    {
		if ( defined( 'DROPSHIP_TOOL_BY_MANTELLA_VERSION' ) ) {
			$this->version = DROPSHIP_TOOL_BY_MANTELLA_VERSION;
		} else {
			$this->version = '2.2.0';
		}
		$this->plugin_name = 'dropship-tool-by-mantella';

        //Setting up domain information
        $this->domain = get_home_url();
        //$this->domain = 'https://online-pakket.nl';
        $this->domain = str_replace('https://www.', '', $this->domain);
        $this->domain = str_replace('https://.', '', $this->domain);
        $this->domain = str_replace('https://', '', $this->domain);
        $this->domain = str_replace('http://www.', '', $this->domain);
        $this->domain = str_replace('www.', '', $this->domain);
        $this->domain = str_replace('http://.', '', $this->domain);
        $this->domain = str_replace('http://', '', $this->domain);
        $this->domain = str_replace('-', '', $this->domain);
        $this->domain = str_replace('.', '', $this->domain);
        $this->domain = str_replace('/', '', $this->domain);
        $this->domain = strtolower($this->domain);
        //API Domain
        $this->api_domain = 'https://portal.mantella.nl/';

        $this->data = array(
            'plugin_name'	 	=> $this->get_plugin_name(),
            'plugin_version'	=> $this->get_version(),
            'plugin_domain'     => $this->domain,
            'api_domain'        => $this->api_domain
        );

        $this->load_dependencies();
		
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'templates/mantella_template.php';
		new DropshipTemplate($this->data);
	}

	private function load_dependencies()
    {
        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/mantella_update.php';
		new DropshipUpdate($this->data);
		
        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/mantella_addtocart.php';
        new DropshipAddtoCart($this->data);

        //include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/mantella-cron-product-update.php';
        //new DropshipCronProductUpdate($this->data);

        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/mantella_order_update_track.php';
        new DropshipOderUpdateTrack($this->data);

        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/wp-product-import.php';
        new DropshipProductImport($this->data);

        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/mantella_import_update_method-with-time.php';
        new DropshipImportUpdateMethodWithTime($this->data);

        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/mantella-product-tabs.php';
        new DropshipProductTabs($this->data);

        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'core/dropship_core_functions.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-dropship-tool-by-mantella-loader.php';

		$this->loader = new Dropship_Tool_By_Mantella_Loader();

	}

	public function run()
    {
		$this->loader->run();
	}

	public function get_plugin_name()
    {
		return $this->plugin_name;
	}

	public function get_version()
    {
		return $this->version;
	}

}
