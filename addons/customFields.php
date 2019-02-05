<?php 

$metaboxes = array(
    'staff' => array(
        'title' => 'Product Info',
        'applicableto' => 'products-post',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'productPrice' => array(
                'title' => 'Price of the product',
                'type' => 'number',
                'description' => ''
            ),
            'peopleAmount' => array(
                'title' => 'Amount of People',
                'type' => 'number',
                'description' => ''
            )
        )
    )
 );


 function add_custom_fields(){
  global $metaboxes;
  if(! empty($metaboxes) ){
      foreach($metaboxes as $id => $metabox){
          add_meta_box($id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id);
      }
  }
}
add_action('admin_init', 'add_custom_fields');

function show_metaboxes($post, $args){
  global $metaboxes;
  $fields = $metaboxes[$args['id']]['fields'];
  $customValues = get_post_custom($post->ID);
  $output = '<input type="hidden" name="post_format_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'">';
  if(! empty($fields)){
      foreach ($fields as $id => $field) {
          switch($field['type']){
              case 'text':
                  $output .= '<label for="'.$id.'" class="customLabel">'.$field['title'].'</label>';
                  $output .= '<p>'.$field['description'].'</p>';
                  $output .= '<input type="text" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
              break;
              case 'number':
                  $output .= '<label for="'.$id.'" class="customLabel">'.$field['title'].'</label>';
                  $output .= '<input type="number" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
              break;
              case 'select':
                  $output .= '<label class="customLabel">'.$field['title'].'</label><br>';
                  $output .= '<select name="'.$id.'"><option>Choose an Option</option>';
                  $options = $field['options'];
                  foreach ($options as $option) {
                      $output .= '<option value="'.$option.'">'.$option.'</option>';
                  }
                  $output .= '</select>';
              break;
              case 'email':
                  $output .= '<label class="customLabel">'.$field['title'].'</label>';
                  $output .= '<input type="email" name="'.$id.'" class="customField" value="'.$customValues[$id][0].'">';
              break;
              case 'image':
                  $image =  get_post_meta( $post->ID, $id, true );
                  if($image){
                      $imagesrc = wp_get_attachment_image_url($image, 'header_image', false);
                      $removeClasses = "remove_custom_images button";
                  } else{
                      $removeClasses = "remove_custom_images button hidden";
                  }
                  $output .= '<div class="image-form-group">';
                      $output .= '<label for="'.$id.'" class="customLabel">'.$field['title'].'</label><br>';
                      $output .= '<p>'.$field['description'].'</p><br>';
                      $output .= '<img class="custom_image" src="'.$imagesrc.'">';
                      $output .= '<input type="hidden" value="' . $custom[$id][0] . '" class="customInput regular-text process_custom_images" name="'.$id.'" max="" min="1" step="1" readonly style="display:block">';
                      $output .= '<button class="set_custom_images button">Add Image</button>';
                      $output .= '<button class="'.$removeClasses.'">Remove Image</button>';
                  $output .= '</div>';
              break;
              default:
                  $output .= '<label class="customLabel">'.$field['title'].'</label>';
                  $output .= '<input type="text" name="'.$id.'">';
              break;
          }
      }
  }
  echo $output;
}
function save_metaboxes($postID){
  global $metaboxes;
  if(! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename(__FILE__) )){
      return $postID;
  }
  if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
      return $postID;
  }
  if($_POST['post_type'] == 'page'){
      if(! current_user_can('edit_page', $postID) ){
          return $postID;
      }
  } elseif(! current_user_can('edit_page', $postID) ){
      return $postID;
  }
  $post_type = get_post_type();
  foreach($metaboxes as $id => $metabox){
      if( $metabox['applicableto'] == $post_type ){
          $fields = $metaboxes[$id]['fields'];
          foreach ($fields as $id => $field) {
              $oldValue = get_post_meta($postID, $id, true);
              $newValue = $_POST[$id];
              if($newValue && $newValue != $oldValue){
                  update_post_meta($postID, $id, $newValue);
              } elseif($newValue == '' && $oldValue || !isset($_POST[$id])){
                  delete_post_meta($postID, $id, $oldValue);
              }
          }
      }
  }
}
add_action('save_post', 'save_metaboxes');