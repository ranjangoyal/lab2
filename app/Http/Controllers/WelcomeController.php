<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(){
	
		$strIH = $this->readingXML();
		return view('welcome')->with("strIH", $strIH);

	}//index


	public function readingXML(){

		$arrItems = array();
		$filename = "items.xml";
		$contents = file_get_contents($filename);

		if(strlen($contents) > 0){
			$xml = simplexml_load_string($contents);
			$json = json_encode($xml);
			$arrItems = json_decode($json,TRUE);
		}//if

		$strIH="";//String Items Html

		if(isset($arrItems['item']) && count($arrItems['item']) > 0){

			if(count($arrItems['item'], 1) == 4){

				foreach($arrItems as $item){

					$strIH.='<div class="row">';
						$strIH.='<div class="col-sm-3">'.$item['name'].'</div>';
						$strIH.='<div class="col-sm-2"><span style="padding-right:20%;float:right;">'.$item['qty'].'</span></div>';
						$strIH.='<div class="col-sm-2"><span style="padding-right:30%;float:right;">'.$item['price'].'</span></div>';
						$strIH.='<div class="col-sm-3">'.$item['dtSubmit'].'</div>';
						$strIH.='<div class="col-sm-2"><span style="float:right;">'.$item['qty']*$item['price'].'</span></div>';
					$strIH.='</div>';

				}//foreach

			}else{
			
				foreach($arrItems['item'] as $item){

					$strIH.='<div class="row">';
						$strIH.='<div class="col-sm-3">'.$item['name'].'</div>';
						$strIH.='<div class="col-sm-2"><span style="padding-right:20%;float:right;">'.$item['qty'].'</span></div>';
						$strIH.='<div class="col-sm-2"><span style="padding-right:30%;float:right;">'.$item['price'].'</span></div>';
						$strIH.='<div class="col-sm-3">'.$item['dtSubmit'].'</div>';
						$strIH.='<div class="col-sm-2"><span style="float:right;">'.$item['qty']*$item['price'].'</span></div>';
					$strIH.='</div>';

				}//foreach

			}//if-else




		}//if

		return $strIH;

	}//readingXML


	public function createItemXML(){

		$strXML = "<item>";
			$strXML .= "<name>".$_POST['pname']."</name>";
			$strXML .= "<qty>".$_POST['qty']."</qty>";
			$strXML .= "<price>".$_POST['price']."</price>";
			$strXML .= "<dtSubmit>".date("Y-m-d H:i:s")."</dtSubmit>";
		$strXML .= "</item>";

		return $strXML;

	}//createItemXML

	public function createXML(){

		$strXML = "<items>";
			$strXML .= $this->createItemXML();
		$strXML .= "</items>";

		return $strXML;

	}//createXML

	public function createXMLFile(){

		$filename = "items.xml";
		$contents = file_get_contents($filename);

		if(strlen($contents) > 0){
			$strXML = $this->createItemXML();
			$contents = str_replace("</items>", $strXML."</items>", $contents);

		}else{
			$contents = $this->createXML();

		}

		$handle = fopen($filename, 'w');
		fwrite($handle, $contents);

	}//createXMLFile



}//End of class
