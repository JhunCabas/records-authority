<?php
/**
 * Copyright 2011 University of Denver--Penrose Library--University Records Management Program
 * Author evan.blount@du.edu
 * 
 * This file is part of Records Authority.
 * 
 * Records Authority is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Records Authority is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Records Authority.  If not, see <http://www.gnu.org/licenses/>.
 **/
 
	$data['title'] = 'Upload Success - Records Authority';
	$this->load->view('includes/adminHeader', $data); 
?>
<div id="tabs">
	<ul>
    	<li class="ui-tabs-nav-item"><a href="#fragment-1">Upload Success</a></li>
    </ul>
    
    <div id="fragment-1">
    	<div class="adminForm">

		<h3>Your file was successfully uploaded!</h3>
		
		<ul>
		<?php foreach($upload_data as $item => $value):?>
		<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
		</ul>
		
		<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>


		</div>
    </div>
</div>
 
<?php $this->load->view('includes/adminFooter'); ?>