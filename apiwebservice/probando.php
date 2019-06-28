<?php 
	$api_key = "a26dd25ad5ac01ccd7c340de3a2792f3"; //Obtener una API Key en: https://www.flickr.com/services/api/misc.api_keys.html
   $request =  'http://api.flickr.com/services/rest/?method=flickr.photos.getRecent&per_page=5&api_key=' . $api_key;
   $response = file_get_contents($request);
   $lib = new simpleXMLElement($response);

    foreach ( $lib->children() as $child )
    {
       foreach ( $child->children() as $subchild)
       {
           $url = 'https://farm' . $subchild['farm'] . '.staticflickr.com/' . $subchild['server'] . '/' . $subchild['id'] . '_' . $subchild['secret'] . '_q.jpg';
           
           echo '<figure>';
           echo '<a target="_blank" href="https://www.flickr.com/photos/' . $subchild['owner'] . '/' . $subchild['id'] . '/" target="_blank">';
           echo '<img src="' . $url . '" alt="' . $subchild['title'] . '">';
           echo '<figcaption>';
           echo '<p>' . utf8_decode($subchild['title']) . '</p>';
           echo '</figcaption>';
           echo '</a>';
           echo '</figure>';
       }
   }
?>