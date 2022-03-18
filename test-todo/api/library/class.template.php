<?php
    /*
    * Created by PhpStorm.
    * Author: Linga
    * Date: 17/03/2022
    * Time: 07:20 PM
    * This class contains and controls the class file or any other information to open directly 
    * */
    class template
    {
        private $template;

        function __construct($template = "index.php")
        {
            if (isset($template))
            {
				$this->template = $template;
                $this->load();
				$this->publish();
            }
        }

        public function load()
        {
			if(!file_exists("../".$this->template))
			{
				//$this->template = "404.php";
			}
			else
            {
               $this->template = $this->template;
            }
        }

        public function publish()
        {
            //include("../".$this->template);
        }
    }
?>