<?php
$result = new stdClass();
$result->success = true;
$result->message = '
	<div class="popup-window" role="dialog" aria-modal="true" aria-labelledby="popup-title">
		<h2 class="h1" id="popup-title">Title</h2>
		<p>Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Sapiente amet quasi ipsum quae! Adipisci velit aperiam blanditiis omnis est nulla repellendus ea maxime inventore? Optio, saepe modi consequuntur.</p>
		</div>
';
echo json_encode($result);
