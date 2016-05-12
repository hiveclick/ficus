<?php
	/* @var $bed Ficus\Bed */
	$bed = $this->getContext()->getRequest()->getAttribute("bed", array());
	$rooms = $this->getContext()->getRequest()->getAttribute("rooms", array());
	$facilities = $this->getContext()->getRequest()->getAttribute("facilities", array());
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title"><?php echo \MongoId::isValid($bed->getId()) ? 'Edit' : 'Add' ?> Bed</h4>
</div>
<form class="" id="bed_form_<?php echo $bed->getId() ?>" method="<?php echo \MongoId::isValid($bed->getId()) ? 'PUT' : 'POST' ?>" action="/api" autocomplete="off" role="form">
	<input type="hidden" name="func" value="/admin/bed" />
	<?php if (\MongoId::isValid($bed->getId())) { ?>
		<input type="hidden" name="_id" value="<?php echo $bed->getId() ?>" />
	<?php } ?>
	<div class="modal-body">
	    <div class="nav-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#basic" data-toggle="tab">Bed</a></li>
                <li><a href="#occupant" data-toggle="tab">Occupant</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="basic">
            		<div class="help-block">Enter the location and details about this bed</div>
            		<div class="form-group">
            			<label class="control-label" for="name">Name</label>
            			<input type="text" id="name" name="name" class="form-control" placeholder="Enter bed's name" value="<?php echo $bed->getName() ?>" />
            		</div>
            
            		<hr />
            		
            		<div class="form-group">
            			<label class="control-label" for="facility">Facility</label>
            			<select name="facility" id="facility">
            			    <optgroup label="Selected Facility">
                                <?php 
                                    /* @var $facility \Ficus\Facility */
                                    foreach ($facilities as $facility) {
                                ?>
                                    <?php if ($bed->getFacility()->getId() == $facility->getId()) { ?>
                                        <option value="<?php echo $facility->getId() ?>" <?php echo $bed->getFacility()->getId() == $facility->getId() ? 'selected' : '' ?>><?php echo $facility->getName() ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </optgroup>
                            <optgroup label="All Facilities">
                                <?php 
                                    /* @var $facility \Ficus\Facility */
                                    foreach ($facilities as $facility) {
                                ?>
                                    <?php if ($bed->getFacility()->getId() != $facility->getId()) { ?>
                                    <option value="<?php echo $facility->getId() ?>" <?php echo $bed->getFacility()->getId() == $facility->getId() ? 'selected' : '' ?>><?php echo $facility->getName() ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </optgroup>
            			</select>
            		</div>
                        		
            		<div class="form-group">
            			<label class="control-label" for="room">Room</label>
            			<select id="room" name="room" class="form-control" placeholder="Enter room name">
                            <?php 
                                /* @var $facility \Ficus\Facility */
                                foreach ($facilities as $facility) {
                            ?>
                                <optgroup label="<?php echo $facility->getName() ?>">
                                <?php foreach ($rooms as $room) { ?>
                                    <?php if ($room['facility_name'] == $facility->getName()) { ?>
                                        <option value="<?php echo $room['_id'] ?>" <?php echo $bed->getRoom() == $room['_id'] ? 'selected' : '' ?>><?php echo (strpos($room['room_name'], '_') !== false) ? substr($room['room_name'], 0, strpos($room['room_name'], '_')) : $room['room_name'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                                </optgroup>
                            <?php } ?>
            			</select>
            		</div>
            		
            		<hr />
            		
            		<div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="private_bath">Bathroom</label><br />
                                <input type="hidden" name="private_bath" id="private_bath_0" value="0" />
                                <input type="checkbox" name="private_bath" id="private_bath_1" value="1" <?php echo $bed->getPrivateBath() ? 'checked' : '' ?> />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="private_bath">Bedroom</label><br />
                                <input type="hidden" name="private_room" id="private_room_0" value="0" />
                                <input type="checkbox" name="private_room" id="private_room_1" value="1" <?php echo $bed->getPrivateRoom() ? 'checked' : '' ?> />
                            </div>
                        </div>
            		</div>
        		</div>
        		<div class="tab-pane fade" id="occupant">
                    <div class="help-block">This is is currently occupied by the following client.</div>
            		
        		</div>
    		</div>
		</div>
	</div>
	<div class="modal-footer">
		<?php if (\MongoId::isValid($bed->getId())) { ?>
			<input type="button" class="btn btn-danger" value="Delete Bed" class="small" onclick="javascript:confirmDelete();" />
		<?php } ?>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Save changes</button>
	</div>
</form>
<script>
//<!--
$(document).ready(function() {
    $('#facility').selectize();

    $('#private_bath_1,#private_room_1').bootstrapSwitch({
        size: 'small',
        onText: 'private',
        offText: 'shared'
    });

    $('#room').selectize({
		delimiter: ',',
		addPrecedence: true,
		persist: true,
		searchField: ['name'],
		valueField: '_id',
		labelField: 'name',
		createOnBlur: true,
		create: function(input) {
			return {_id: input, name: input}
		}
	});
	
	$('#bed_form_<?php echo $bed->getId() ?>').form(function(data) {
		$.rad.notify('Bed Updated', 'The bed has been added/updated in the system');
		$('#bed_search_form').trigger('submit');
		$('#edit_bed_modal').modal('hide');
	}, {keep_form:1});
});

<?php if (\MongoId::isValid($bed->getId())) { ?>
function confirmDelete() {
	if (confirm('Are you sure you want to delete this bed from the system?')) {
		$.rad.del({ func: '/admin/bed/<?php echo $bed->getId() ?>' }, function(data) {
			$.rad.notify('You have deleted this bed', 'You have deleted this bed.  You will need to refresh this page to see your changes.');
			$('#bed_search_form').trigger('submit');
		});
	}
}
<?php } ?>
//-->
</script>