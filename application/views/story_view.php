<section id="cd-timeline" class="cd-container cd-section">
    <?php foreach ($events as $event) {
        ?>                
        <div class="cd-timeline-block">
            <div class="cd-timeline-img cd-picture">
                <img src="<?php echo base_url(); ?>assets/img/cd-icon-picture.svg" alt="Picture">
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2><?php echo $event->title; ?></h2>
                <p><?php echo $event->body; ?></p>

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

                <a href="#0" class="cd-read-more">Read more</a>
                <span class="cd-date">Jan 14</span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->


        <?php
    }
    ?>


    <div class="cd-modal-action">
        <a href="#0" class="btn" data-type="modal-trigger">Add event</a>
        <span class="cd-modal-bg"></span>
    </div> <!-- cd-modal-action -->
    <div class="cd-modal">
        <div class="cd-modal-content">
            <form class="cd-form floating-labels" method="post" action="<?php echo base_url();?>story/saveEvent/<?php echo $story->id;?>">
                <fieldset>
                    <legend>Add event</legend>

                    

                    <div class="icon">
                        <label class="cd-label" for="cd-name">Title</label>
                        <input class="message" type="text" name="title" id="cd-name" required>
                    </div> 
                    
                    <div class="icon">
                        <label class="cd-label" for="cd-textarea">More details..</label>
                        <textarea class="message" name="description" id="cd-textarea" required></textarea>
                    </div>

                    <div>
                        <input type="submit" value="Memorise this event :)">
                    </div>
                </fieldset>
            </form>
        </div> <!-- cd-modal-content -->
    </div> <!-- cd-modal -->
    <a href="#0" class="cd-modal-close">Close</a>
</section> <!-- cd-timeline -->