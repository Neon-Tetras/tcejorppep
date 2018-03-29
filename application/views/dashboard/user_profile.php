

<div class="container">
	<div class="row">
            <div class="col-lg-4 col-sm-4">
                
            </div>
		<div class="col-lg-4 col-md-4">
            <div class="card hovercard" >
                <div class="cardheader">
                    
                </div>
                <div class="avatar">
                    <img alt="" src="http://lorempixel.com/100/100/people/9/">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://scripteden.com/">
                            <?=strtoupper($user_data->getFirstName()." ".$user_data->getLastName());?>
                        </a>
                    </div>
                    <div class="desc">(<?= strtoupper($user_data->getUsername()); ?>)</div>
                    <div class="desc"><?= strtoupper($user_data->getGroups()[0]->getName()); ?></div>
                     <div class="desc"><?= strtoupper($user_data->getPhone()); ?></div>
                     <div class="desc">Referral Id: <?= strtoupper($user_data->getReferralId()); ?></div>
                     <p></p>
                     <div class="desc"><a class="btn btn-primary" href="<?= site_url("dashboard/edit_profile")?>">Edit Profile</a></div>
<!--                    <div class="desc">Curious developer</div>
                    <div class="desc">Tech geek</div>-->
                </div>
                <div>
                    
                </div>
            </div>
        </div>
            
            <div class="col-lg-4 col-md-4">
                
            </div>

	</div>
</div>