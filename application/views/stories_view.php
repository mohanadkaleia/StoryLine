<?php 
    if (count($storyEvents) > 0) {
        
    }
?>
<section id="cd-timeline" class="cd-container cd-section">
<container>
    <div class="container-fluid">
        <?php 
            for ($i = 0 ; $i <= count($stories); $i++) {
                if (($i % 4) == 0) {
                    ?>
                    <div class="row">
                    <?php
                }
                ?>
                        
                <?php if ($i == 0) {
                ?>
                <div class="col-md-3 col-sm-6 col-sm-12 cd-modal-action">
                    <div class="product" id="sign-in-form">                                       
                        <div class="dark-primary-color sign-in-img">
                            Sign in / Register
                        </div>
                        
                        <div class="sign-in-logo"><i class="fa fa-hand-peace-o"></i></div>
                        <form>                                                                                    
                            <input type="text" name="email" class="form-control" placeholder="email" aria-describedby="basic-addon1">                      
                            <input type="password" class="form-control" name="password" required="true" placeholder="y*ur P@ssw*rd"/>
                            
                            <input type="submit" value="Login" class="btn btn-info"/>
                            
                            <div class="social">
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i> </a>
                                <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="register">or simply register :)</a>
                            </div>
                            
                            <a href="#" class="forgot-passowrd">Forgot you password :(</a>                           
                        </form>
                    </div>
                    <span class="cd-modal-bg" style=""></span>
                </div>        
                        
                        
<!--                <div class="col-md-3 col-sm-6 col-sm-12 cd-modal-action">
                    <div class="product product-add" data-type="modal-trigger">                                       
                        <span>Tell every one about your story :)</span>
                        <br>
                        <span>Click to write </span>                                               
                    </div>
                    <span class="cd-modal-bg" style=""></span>
                </div>-->
                <?php
                continue;
                }
                ?> 
                
                       
                <div class="col-md-3 col-sm-6 col-sm-12">
                    <div class="product">
                        <?php
                            if (count($storyEvents[$stories[$i-1]->id]) > 0) {
                                $imagePath = base_url().'files/photo/'.$stories[$i-1]->id.'/'.$storyEvents[$stories[$i-1]->id][0]->image;
                            } else {
                                $imagePath = "http://dummyimage.com/900x800/018876/005c50.png&text=0x23".$stories[$i-1]->title;
                            }
                        ?>
                        <img src="<?php echo $imagePath;?>"/>                                           
                        <h3 class="title"><?php echo $stories[$i-1]->title;?></h3>
                        <p><?php echo word_limiter($stories[$i-1]->description, 50);?></p>                        
                        <div class="product-more">
                            <a href="<?php echo base_url();?>story/show/<?php echo $stories[$i-1]->id;?>" class="details">Read</a>                            
                            <a href="#" class="share"><i class="fa fa-share-alt"></i></a> 
                            <a href="#" class="like"><i class="fa fa-heart-o"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                if (($i % 4) == 3) {
                    ?>
                    </div>
                    <?php
                }
            }
        ?>        
        </div>                
    </div>
</container>
