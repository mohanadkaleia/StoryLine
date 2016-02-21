<div class="cd-modal">
    <div class="cd-modal-content">
        <form class="cd-form floating-labels" method="post" action="<?php echo base_url(); ?>event/save/<?php echo $story->id; ?>" enctype="multipart/form-data">
            <fieldset>
                <legend>Add event</legend>                                     
                <div class="icon">
                    <!--<label class="cd-label" for="cd-name">Title</label>-->
                    <input class="message" type="text" name="title" id="cd-name" placeholder="Title" required>
                </div>
                <div class="left-content col-md-5 col-xs-5 col-sm-12">                            
                    <div class="icon">
                        <!--<label class="cd-label" for="eventDate">Date</label>-->
                        <input class="email" type="text" name="eventDate" id="eventDate" placeholder="Date" required>
                    </div>
                    <div class="icon">
                        <div class="input-group">
                            <input type="text" id="photoName" name="photoName" class="form-control image" placeholder="Upload photo">
                            <span class="input-group-btn photo-upload">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                                    <input type="file" id="fileUpload" name="fileUpload" class="btn btn-default"/>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="icon">
                        <!--<label class="cd-label" for="cd-source">Other links</label>-->
                        <input class="budget" type="text" name="source" id="source" placeholder="Resources">
                    </div>
                </div>
                <div class="right-content col-md-7 col-xs-7 col-sm-12">                             
                    <div class="icon">
                        <!--<label class="cd-label" for="cd-textarea">More details..</label>-->
                        <textarea class="message" name="description" id="cd-textarea" required placeholder="Description..."></textarea>
                    </div>
                </div>                                        
                <div>
                    <input type="submit" value="Memorize this event :)">
                </div>
            </fieldset>
        </form>
    </div> <!-- cd-modal-content -->
</div> <!-- cd-modal -->
<a href="#0" class="cd-modal-close">Close</a>

<script>
    //$('#eventDate').datepicker('show');
    $('#eventDate').datepicker({
        startView: 2,
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    
    $('#fileUpload').change(function() {
        //var filename = $('#fileUpload').val();
        var filename = $('#fileUpload').val().split('\\').pop();
        $('#photoName').val(filename);
    });       
</script>