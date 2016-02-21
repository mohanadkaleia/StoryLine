<div class="cd-modal">
    <div class="cd-modal-content">
        <form class="cd-form floating-labels" method="post" action="<?php echo base_url(); ?>story/save" enctype="multipart/form-data">
            <fieldset>
                <legend>Add Story</legend>                                     
                <div class="icon">
                    <!--<label class="cd-label" for="cd-name">Title</label>-->
                    <input class="message" type="text" name="title" id="cd-name" placeholder="Title" required>
                    <textarea class="message" name="description" id="cd-textarea" required placeholder="Description..."></textarea>                    
                </div>                                                                        
                <div>
                    <input type="submit" value="Add story">
                </div>
            </fieldset>
        </form>
    </div> <!-- cd-modal-content -->
</div> <!-- cd-modal -->
<a href="#0" class="cd-modal-close">Close</a>