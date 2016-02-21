<?php foreach ($events as $event) {
    ?>                
    <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
            <img src="<?php echo base_url(); ?>assets/img/cd-icon-picture.svg" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
            <h2><?php echo $event->title; ?></h2>
            <p><?php echo $event->body; ?></p>
            <img src= "<?php echo base_url();?>files/photo/<?php echo $event->story_id. '/' . $event->image; ?>"/>
            
            <nav class="cd-stretchy-nav edit-content">
                <a class="cd-nav-trigger" href="#0">                        
                    <span aria-hidden="true"></span>
                </a>

                <ul>             
                    <li><a href="#0"><span>Share</span></a></li>
                    <li><a href="#0"><span>Save</span></a></li>
                    <li><a href="#0"><span>Trash</span></a></li>
                </ul>

                <span aria-hidden="true" class="stretchy-nav-bg"></span>
            </nav>

            <a href="<?php echo $event->source;?>" class="cd-read-more">Resources</a>
            <span class="cd-date"><?php echo $event->event_date; ?></span>
        </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->        

    <?php
}
?>

<div class="cd-modal-action">
    <a href="#0" class="btn" data-type="modal-trigger">Add event</a>
    <span class="cd-modal-bg"></span>
</div> <!-- cd-modal-action -->    


