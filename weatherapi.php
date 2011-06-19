<?php
function xml2array($contents, $get_attributes=1, $priority = 'tag') {
    if(!$contents) return array();

    if(!function_exists('xml_parser_create')) {
        //print "'xml_parser_create()' function not found!";
        return array();
    }

    //Get the XML parser of PHP - PHP must have this module for the parser to work
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);

    if(!$xml_values) return;//Hmm...

    //Initializations
    $xml_array = array();
    $parents = array();
    $opened_tags = array();
    $arr = array();

    $current = &$xml_array; //Refference

    //Go through the tags.
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
    foreach($xml_values as $data) {
        unset($attributes,$value);//Remove existing values, or there will be trouble

        //This command will extract these variables into the foreach scope
        // tag(string), type(string), level(int), attributes(array).
        extract($data);//We could use the array by itself, but this cooler.

        $result = array();
        $attributes_data = array();
        
        if(isset($value)) {
            if($priority == 'tag') $result = $value;
            else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        }

        //Set the attributes too.
        if(isset($attributes) and $get_attributes) {
            foreach($attributes as $attr => $val) {
                if($priority == 'tag') $attributes_data[$attr] = $val;
                else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
            }
        }

        //See tag status and do the needed.
        if($type == "open") {//The starting of the tag '<tag>'
            $parent[$level-1] = &$current;
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                $current[$tag] = $result;
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                $repeated_tag_index[$tag.'_'.$level] = 1;

                $current = &$current[$tag];

            } else { //There was another element with the same tag name

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                    $repeated_tag_index[$tag.'_'.$level]++;
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag.'_'.$level] = 2;
                    
                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                        unset($current[$tag.'_attr']);
                    }

                }
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                $current = &$current[$tag][$last_item_index];
            }

        } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
            //See if the key is already taken.
            if(!isset($current[$tag])) { //New Key
                $current[$tag] = $result;
                $repeated_tag_index[$tag.'_'.$level] = 1;
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

            } else { //If taken, put all things inside a list(array)
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...

                    // ...push the new element into that array.
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                    
                    if($priority == 'tag' and $get_attributes and $attributes_data) {
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag.'_'.$level]++;

                } else { //If it is not an array...
                    $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag.'_'.$level] = 1;
                    if($priority == 'tag' and $get_attributes) {
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            
                            $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                            unset($current[$tag.'_attr']);
                        }
                        
                        if($attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        }
                    }
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                }
            }

        } elseif($type == 'close') { //End of tag '</tag>'
            $current = &$parent[$level-1];
        }
    }
    
    return($xml_array);
}  

function getInfo($location){
	$file = file_get_contents("http://www.google.com/ig/api?weather=".$location,true);
	$file = str_replace("<?","",$file);
	$file = str_replace('xml version="1.0"?>',"",$file);
	return xml2array($file);
}

if(isset($_REQUEST['location'])){
	$info = getInfo($_REQUEST['location']);
	$req  = $_REQUEST;
	$ampm = date("a");
	$ampm = ($ampm == "pm") ? "_pm" : "";
	if(isset($req['view'])){
		switch($req['view']){
			
			case "all":
				$data['current'] = $info['xml_api_reply']['weather']['current_conditions'];
				$data['followingdays'] = $info['xml_api_reply']['weather']['forecast_conditions'];
			break;
			
			default:
			case "today":
				$data['location'] = $info['xml_api_reply']['weather']['forecast_information']['city_attr']['data'];
				$data['condition'] = $info['xml_api_reply']['weather']['current_conditions']['condition_attr']['data'];
				$data['temp_f'] = $info['xml_api_reply']['weather']['current_conditions']['temp_f_attr']['data'];
				$data['temp_c'] = $info['xml_api_reply']['weather']['current_conditions']['temp_c_attr']['data'];
				$data['humidity'] = $info['xml_api_reply']['weather']['current_conditions']['humidity_attr']['data'];
				$data['icon'] = str_replace("/ig/images","",$info['xml_api_reply']['weather']['current_conditions']['icon_attr']['data']);
				$data['icon'] = str_replace(".gif",$ampm.".png",$data['icon']);
				$data['wind'] = isset($info['xml_api_reply']['weather']['current_conditions']['wind_condition_attr']['data']) ? $info['xml_api_reply']['weather']['current_conditions']['wind_condition_attr']['data'] : '';
			break;
		}
		if(isset($req['type']) && $req['type'] == "header"){
			?>
			<div class="logo">
				<img src="<?php echo $data['icon']; ?>" alt="<?php echo $data['condition']; ?>" border="0" />
			</div>
			<div class="info">
				<span class="location"><?php echo $data['location']; ?></span><br />
				<?php echo $data['condition']; ?> - <?php echo $data['temp_c']; ?>&deg;C<br />
				<?php echo $data['humidity']; ?><p>
				<a href="#">view more</a></p>
			</div>
			<br clear="all" />
			<?php
		}else if(isset($req['type']) && $req['type'] == "sidebar"){
			
			?>
			
			<span class="wea-column" style="height: 125px; overflow: auto;">
				<span class="wedate">Current</span>
				<span class="weimage">
					<img width="52" height="52" alt="" src="http://www.google.com<?php echo $data['current']['icon_attr']['data']; ?>">
				</span>
				<span class="wecond"><?php echo $data['current']['condition_attr']['data']; ?></span>
				<span class="wetemp"><?php echo $data['current']['temp_c_attr']['data']; ?> &deg;C</span>		
			</span>
			
			<?php
			$x = 0;
			foreach($data['followingdays'] as $wdata){
			?>
				<span class="wea-column" style="height: 125px; overflow: auto; <?php if($x>=1){ echo 'border-right:0;'; } ?>">
					<span class="wedate"><?php echo $wdata['day_of_week_attr']['data']; ?></span>
					<span class="weimage">
						<img width="52" height="52" alt="" src="http://www.google.com<?php echo $wdata['icon_attr']['data']; ?>">
					</span>
					<span class="wecond"><?php echo $wdata['condition_attr']['data']; ?></span>	
				</span>
			<?php
			$x++;
			if($x >= 2){
				break;
			}
			}
			echo "<br clear='all' />";
			
		}else{
			?><div class="logo">
				<img src="/weather/na.png" alt="loading..." />
			</div>
			<div class="info">
				<span class="location"><em>Error</em></span><br />
				0&deg;C | 0&deg;F<br />
				Humidity: 0%
			</div>
			<br clear="all" />
			<?php
		}
	}else{
		return $info;
	}
}else{
	?>
	<div class="logo">
		<img src="/weather/na.png" alt="loading..." />
	</div>
	<div class="info">
		<span class="location"><em>Error in Location</em></span><br />
		0&deg;C | 0&deg;F<br />
		Humidity: 0%
	</div>
	<br clear="all" />
	<?php
}
?>
