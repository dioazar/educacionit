<?php
   $api_key = "a26dd25ad5ac01ccd7c340de3a2792f3"; //Obtener una API Key en: https://www.flickr.com/services/api/misc.api_keys.html

    $request =  'http://api.flickr.com/services/rest/?method=flickr.photos.getRecent&per_page=5&api_key=' . $api_key . '&format=json&nojsoncallback=1'; 
   $lib = file_get_contents( $request );
   $recent = json_decode($lib);

   foreach ($recent->photos->photo as $photo) {
           $url = 'https://farm' . $photo->farm . '.staticflickr.com/' . $photo->server . '/' . $photo->id . '_' . $photo->secret . '_q.jpg';

           echo '<figure>';
           echo '<a target="_blank" href="https://www.flickr.com/photos/' . $photo->owner . '/' . $photo->id . '/" target="_blank">';
           echo '<img src="' . $url . '" alt="' . utf8_decode($photo->title) . '">';
           echo '<figcaption>';
           echo '<p>' . utf8_decode($photo->title) . '</p>';
           echo '</figcaption>';
           echo '</a>';
           echo '</figure>';
   }
?>