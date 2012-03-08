<?php
$growl = new Growl($some_ip_address, 'growl password');

// Register with the remote machine.
// You only need to do this once.
$growl->register();

// Send your message
$growl->notify("My Alert", "New Website Visitor", "Here's the body text");

?>
