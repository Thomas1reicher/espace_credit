<?php
//<BIA WS CALL
//*********************************************************************************************************************************
//********                                                                                                                 ********
//********                                                                                                                 ********
//*********************************************************************************************************************************
namespace App\Api;
use \DOMDocument;


class Api
{
public function ANYSOFT_GETPARAM($p){
	switch($p){
		case 'URL_WS': return 'http://grids.anysoft.lu/interclip/interclip.asmx'; break;
		case 'USR_WS': return 'TEST'; break;
		case 'PWD_WS': return 'TEST'; break;
	}
}

public function any50_htmlspecialchars(&$s){
	return str_replace(">","&gt;",str_replace("<","&lt;",str_replace("\"","&quot;",str_replace("&","&amp;","$s"))));
}

public function any50_decifutf8($s){
	$c1=0;
	$c2=0;
	$c3=0;
	$l=strlen($s);
	for($i=0;$i<$l;$i++){
		$c1=ord(substr($s,$i,1));
		if(($c1&0xf0)==0xe0){
			$i++;
			$c2=ord(substr($s,$i,1));
			$i++;
			$c3=ord(substr($s,$i,1));
			if(($c2&0xC0)==0x80 && ($c3&0xC0)==0x80) return iconv('UTF-8','iso-8859-1//IGNORE',$s);
		}else if(($c1&0xe0)==0xc0){
			$i++;
			$c2=ord(substr($s,$i,1));
			if(($c2&0xC0)==0x80) return iconv('UTF-8','iso-8859-1//IGNORE',$s);
		}
	}
	return $s;
}



//http post
public function any50_xml_helper($url, $postdata = '')
{
	$verb="POST";
  $cparams = array(
    'http' => array(
      'method' => $verb, 'timeout' => 25,
	  'header'=>'content-type: text/xml; charset=iso-8859-1',
      'ignore_errors' => false
    )
  );
  $cparams['http']['content'] = $postdata;

  @$context = stream_context_create($cparams);
  @$fp = fopen($url, 'rb', false, $context);
  if (!$fp) {
    $res = false;
  } else {
    // If you're trying to troubleshoot problems, try uncommenting the
    // next two lines; it will show you the HTTP response headers across
    // all the redirects:
    // $meta = stream_get_meta_data($fp);
    // var_dump($meta['wrapper_data']);
    @$res = stream_get_contents($fp);
  }

  if ($res === false) {
    throw new Exception("$verb $url failed: DATA: @php_errormsg\r\n$postdata");
  }
	return $res;
}

public function any50_myparse_xml($x){
	$dom=new DOMDocument();
	$dom->preserveWhiteSpace=false;
	$c='"utf-8"?>';
	$idx=strpos($x,$c);
	if($idx===false){
		$c='"UTF-8"?>';
		$idx=strpos($x,$c);
	}
	if($idx===false){
		$c='"utf-8" ?>';
		$idx=strpos($x,$c);
	}
	if($idx===false){
		$c='"UTF-8" ?>';
		$idx=strpos($x,$c);
	}
	if($idx!==false){
		//patch UTF8 encode de l'euro
		$x=str_replace("\xe2\x82\xac",utf8_encode("\x80"),$x);
		//$x=str_replace($c,'"iso-8859-1"?'.'>',utf8_decode($x));
	}
	$dom->loadXML($x);
	return $dom;
}

public function any50_base66switch($s){
	$r='';
	$l=strlen($s);
	for($i=0;$i<$l;$i++){
		$c=ord(substr($s,$i,1));
		if ($c >= 48 && $c <= 57)
		{
			//inv 0-9 9-0
			$c = 48 + 9 - ($c - 48);
		}
		else if ($c >= 65 && $c <= 90)
		{
			//inv A-Z z-a
			$c = 65 + 25 - ($c - 65) + 32;
		}
		else if ($c >= 97 && $c <= 122)
		{
			//inv a-z Z-A
			$c = 97 + 25 - ($c - 97) - 32;
		}
		$r.=chr($c);
	}
	return $r;
}

public function any50_base66encode($s){
	return $this->any50_base66switch(base64_encode($s));
}
public function any50_base66decode($s){
	return base64_decode($this->any50_base66switch($s));
}

public function any50_call_simple_method($methodname,$datafields){
	//compo dynamique fields message
	$xfields='';
	foreach($datafields as $k=>$v){
		$xfields.="<$k>".$this->any50_htmlspecialchars($v)."</$k>";
	}
	//composition message soap
	$xml='<?xml version="1.0" encoding="iso-8859-1"?>'
		.'<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body>'
		.'<'.$methodname.' xmlns="http://tempuri.org/">'
		//champs
		.$xfields
		//
		.'</'.$methodname.'>'
		.'</soap:Body></soap:Envelope>'
	;
	//recuperation xml et gestion d'erreur
	
	$ws_out=$this->any50_xml_helper($this->ANYSOFT_GETPARAM("URL_WS"),$xml);
	if($ws_out=="") throw new Exception("empty xml [500]");
	$dom=$this->any50_myparse_xml($ws_out);
	$node=$dom->getElementsByTagName($methodname."Result");
	@$node=&$node->item(0);
	if($node=="")  throw new Exception("failed to decode ws as xml");
	@$v=$node->childNodes->item(0)->nodeValue;
	if($v=='') $v=$node->nodeValue;
	return $v;
}




public function any50_callWS($forminject, $in_ref_credit=""){
	$forminject=@$forminject.'';
	$in_ref_credit=@$in_ref_credit.'';
	$XmlRequest="";
	$lf="\n";
	if(substr($forminject,0,5)=='<'.'?xml'){
		$XmlRequest=$forminject;
	}else{
		//$forminject=any50_decifutf8($forminject);
		$forminject=$forminject.$lf."ref_credit:".$lf."leadid:".$lf;
		$XmlRequest=$forminject;
	}
	$err=0;
	$r="";
	$nbc=rand(1,3);
	@$randstr="".mktime();
	for($i=0;$i<$nbc;$i++){
		@$randstr.=substr($randstr,strlen($randstr)-$i-1,1);
	}
	try{
		$r=$this->any50_call_simple_method("InterCLIPInject",array("XmlRequest"=>$this->any50_base66encode(''.str_replace("|","",$randstr).'|'.str_replace("|","",$this->ANYSOFT_GETPARAM("USR_WS")).'|'.str_replace("|","",$this->ANYSOFT_GETPARAM("PWD_WS")).'|'.$XmlRequest), "in_ref_credit"=>$in_ref_credit));
	}catch(Exception $ex){
		$r=''.$ex->getMessage();
		$err=1;
	}
	
	if($err==0) {
		$r=$this->any50_base66decode($r);
		if(substr($r,0,1)!="\t"){
			$err=1;
		}
	}
	//<MID>
	$ret_ar=explode("\t",$r);
	$erreur=$err==1 ? $r : ''.@$ret_ar[0];
	$id_credit=0+@$ret_ar[2];
	$id_gestion=0+@$ret_ar[3];
	$ref_credit=''.@$ret_ar[4];
	$strong_id=''.@$ret_ar[5];
	//</MID>
	return array(
		/*<FINALYS>*/"e"=>$err,"r"=>$r/*</FINALYS>*/,
		/*<MID>*/
			"erreur"=>$erreur,
			"ref_credit"=>$ref_credit,
			"strong_id"=>$strong_id
		/*</MID>*/
	);
}


//*********************************************************************************************************************************
//********                                                                                                                 ********
//********                                                                                                                 ********
//*********************************************************************************************************************************
//>BIA WS CALL
}