<div id="topmenu">
  <ul>
    <li><?php echo $html->link('<span>Home</span>', "/",array('escape'=>false)); ?></li>
    <li><?php echo $html->link('<span>The 8</span>', array('controller'=> 'home','action'=>'the_8'),array('escape'=>false)); ?></li>
    <li><?php echo $html->link('<span>The Nest</span>', array('controller'=> 'home','action'=>'the_nest'),array('escape'=>false)); ?></li>
    <li><?php echo $html->link('<span>Location map</span>', array('controller'=> 'contents','action'=>'location_map'),array('escape'=>false)); ?></li>
    <li id="current"><?php echo $html->link('<span>Reservation</span>', array('controller'=> 'contents','action'=>'reservation'),array('escape'=>false)); ?></li>
    <li><?php echo $html->link('<span>Contact</span>', array('controller'=> 'contacts','action'=>'feedback'),array('escape'=>false)); ?></li>
  </ul>
</div>

<?php echo $content['Content']['content']; ?>
