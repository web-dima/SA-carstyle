<?php
/*  
 * Ape Gallery			
 * Author:            	Wp Gallery Ape 
 * Author URI:        	https://wpape.net/
 * License:           	GPL-2.0+
 */

if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ){ exit;  }

function jt_cmb2_colums_field( $metakey, $post_id = 0 ) {
	echo jt_cmb2_get_colums_field( $metakey, $post_id );
}

function jt_cmb2_render_colums_field_callback( $field, $value, $object_id, $object_type, $field_type_object ) {

	$value = wp_parse_args( $value, array(
		 'width' =>  '300', 'colums' => 3,
		 'width1' => '300', 'colums1' => 3,
		 'width2' => '300', 'colums2' => 2,
		 'width3' => '300', 'colums3' => 1,
	) );

	if( $field->args('default') ){
		$value['autowidth1'] = 1;
		$value['autowidth2'] = 1;
		$value['autowidth3'] = 1;
		$value['autowidth'] = 1;		
	}
	if( $field->args('level') ) echo '<div class="ape_premium wpape-block-premium"> <p>'.WPAPE_GALLERY_BUTTON_PREMIUM.'</p></div>';
	?>
<div class="form-horizontal">

	<div class="form-group">
		 <div class="col-sm-10 col-sm-offset-1">
			<table class="table">
				<thead>
					<tr>
						<th>Resolution</th>
						<th>Auto size</th>
						<th>Size</th>
						<th>Columns</th>
					</tr>
				</thead>
				<tbody>
					<tr class="">
						<td class="vert-align"><strong>Default</strong></td>
						<td class=""><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="success" class="wpape_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth' ).'" '
							.( isset($value['autowidth']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums' ).'" '
							.'>';
						 ?></td>
						 <td>
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width]' ),
								'id'    => $field_type_object->_id( '_width' ),
								'value' => (int) $value['width'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td>
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums]' ),
								'id'    => $field_type_object->_id( '_colums' ),
								'value' => (int) $value['colums'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
					</tr>
					<tr>
						<td class="vert-align">960</td>
						<td><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="success" class="wpape_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth1]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth1' ).'" '
							.( isset($value['autowidth1']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width1' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums1' ).'" '
							.'>';
						 ?></td>
						 <td>
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width1]' ),
								'id'    => $field_type_object->_id( '_width1' ),
								'value' => (int) $value['width1'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td>
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums1]' ),
								'id'    => $field_type_object->_id( '_colums1' ),
								'value' => (int) $value['colums1'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
			
					</tr>
					<tr>
						<td class="vert-align">650</td>
						<td><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="success" class="wpape_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth2]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth2' ).'" '
							.(  isset($value['autowidth2']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width2' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums2' ).'" '
							.'>';
						 ?></td>
						<td>
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width2]' ),
								'id'    => $field_type_object->_id( '_width2' ),
								'value' => (int) $value['width2'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td>
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums2]' ),
								'id'    => $field_type_object->_id( '_colums2' ),
								'value' => (int) $value['colums2'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
					</tr>
					<tr>
						<td class="vert-align">450</td>
						<td><?php
						echo 
							'<input type="checkbox" data-toggle="toggle" data-onstyle="success" class="wpape_colums_auto" ' 
							.'name="'.$field_type_object->_name( '[autowidth3]' ).'" '
							.'id="'. $field_type_object->_id( '_autowidth3' ).'" '
							.(  isset($value['autowidth3']) ?' checked ':'')
							.'value="auto" '
							.'data-width-id="'.$field_type_object->_id( '_width3' ).'" '
							.'data-colums-id="'.$field_type_object->_id( '_colums3' ).'" '
							.'>';
						 ?></td>
						 <td>
						 	<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[width3]' ),
								'id'    => $field_type_object->_id( '_width3' ),
								'value' => (int) $value['width3'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?> px
						</td>
						<td>
							<?php
							echo $field_type_object->input( array(
								'name'  => $field_type_object->_name( '[colums3]' ),
								'id'    => $field_type_object->_id( '_colums3' ),
								'value' => (int) $value['colums3'],
								'type'  => 'text',
								'class' => 'small-text'
							) );
							 ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
	<?php
	echo $field_type_object->_desc( true );

}
add_filter( 'cmb2_render_colums', 'jt_cmb2_render_colums_field_callback', 10, 5 );
